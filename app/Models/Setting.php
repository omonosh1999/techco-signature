<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class Setting extends Model
{
    protected $fillable = ['key', 'group', 'label', 'type', 'value', 'help', 'is_secret', 'position'];

    protected function casts(): array
    {
        return ['is_secret' => 'boolean'];
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('settings'));
        static::deleted(fn () => Cache::forget('settings'));
    }

    /**
     * Secrets (API keys) are encrypted at rest so a leaked database dump
     * does not hand over the Paystack account.
     */
    public function setValueAttribute(?string $value): void
    {
        $this->attributes['value'] = $this->is_secret && filled($value)
            ? Crypt::encryptString($value)
            : $value;
    }

    public function getValueAttribute(?string $value): ?string
    {
        if (! $this->is_secret || blank($value)) {
            return $value;
        }

        try {
            return Crypt::decryptString($value);
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * Raw rows keyed by setting key. Cached as plain arrays — caching Eloquent
     * models breaks on deserialization once the model changes shape.
     *
     * @return array<string, array{value: string|null, is_secret: bool}>
     */
    private static function rows(): array
    {
        return Cache::rememberForever('settings', fn () => static::query()
            ->get(['key', 'value', 'is_secret'])
            ->mapWithKeys(fn (self $setting) => [
                $setting->key => [
                    // getAttributes() bypasses the decrypting accessor so the
                    // ciphertext is what lands in the cache, not the secret.
                    'value' => $setting->getAttributes()['value'] ?? null,
                    'is_secret' => (bool) $setting->getAttributes()['is_secret'],
                ],
            ])
            ->all());
    }

    public static function get(string $key, mixed $fallback = null): mixed
    {
        $row = static::rows()[$key] ?? null;

        if ($row === null || blank($row['value'])) {
            return $fallback;
        }

        if (! $row['is_secret']) {
            return $row['value'];
        }

        try {
            return Crypt::decryptString($row['value']);
        } catch (\Throwable) {
            return $fallback;
        }
    }

    public static function number(string $key, float $fallback = 0): float
    {
        return (float) static::get($key, $fallback);
    }
}
