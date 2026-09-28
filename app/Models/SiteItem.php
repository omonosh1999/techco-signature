<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteItem extends Model
{
    protected $fillable = ['collection', 'page', 'data', 'position', 'is_visible'];

    protected function casts(): array
    {
        return [
            'data' => 'array',
            'is_visible' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saved(fn () => static::flush());
        static::deleted(fn () => static::flush());
    }

    /**
     * Visible items in a collection, ordered.
     *
     * Cached as a plain array of arrays — caching Eloquent collections breaks
     * on deserialization once the model changes shape.
     *
     * @return \Illuminate\Support\Collection<int, array<string, mixed>>
     */
    public static function collection(string $name)
    {
        $rows = Cache::rememberForever(
            "site_items.{$name}",
            fn () => static::query()
                ->where('collection', $name)
                ->where('is_visible', true)
                ->orderBy('position')
                ->pluck('data')
                ->all(),
        );

        return collect($rows);
    }

    public static function flush(): void
    {
        foreach (static::query()->distinct()->pluck('collection') as $name) {
            Cache::forget("site_items.{$name}");
        }
    }

    /**
     * Several collections at once, keyed by their short name.
     *
     * `home.services` comes back as `services`, so a page component can hand
     * its view exactly the names the markup uses.
     *
     * @return array<string, \Illuminate\Support\Collection<int, array<string, mixed>>>
     */
    public static function forPage(string $page, array $names): array
    {
        return collect($names)
            ->mapWithKeys(fn (string $name) => [$name => static::collection("{$page}.{$name}")])
            ->all();
    }
}
