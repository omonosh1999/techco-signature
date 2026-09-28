<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteContent extends Model
{
    protected $fillable = ['key', 'page', 'section', 'label', 'type', 'value', 'help', 'position'];

    protected static function booted(): void
    {
        static::saved(fn () => static::flush());
        static::deleted(fn () => static::flush());
    }

    /**
     * Every editable string on the public site, keyed for fast lookup.
     *
     * Cached as a plain array — caching Eloquent collections breaks on
     * deserialization once the model changes shape.
     *
     * @return array<string, string|null>
     */
    public static function allValues(): array
    {
        return Cache::rememberForever(
            'site_contents',
            fn () => static::query()->pluck('value', 'key')->all(),
        );
    }

    public static function get(string $key, ?string $fallback = null): ?string
    {
        return static::allValues()[$key] ?: $fallback;
    }

    public static function flush(): void
    {
        Cache::forget('site_contents');
    }
}
