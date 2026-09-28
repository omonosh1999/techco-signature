@props([
    'eyebrow' => null,
    'line1' => null,
    'line2' => null,
    'line3' => null,
    'body' => null,
    'primary' => null,
    'primaryHref' => '#',
    'secondary' => null,
    'secondaryHref' => '#',
    'stats' => null,
])

<section class="site-inverse">
    <div class="site-shell px-5 pt-14 pb-16 sm:px-8 sm:pt-20 sm:pb-24">
        @if ($eyebrow)
            <p class="eyebrow opacity-55">{{ $eyebrow }}</p>
        @endif

        <h1 class="display site-display mt-6">
            <span class="block">{{ $line1 }}</span>
            <span class="block">{{ $line2 }}</span>
            <span class="block opacity-40">{{ $line3 }}</span>
        </h1>

        <div class="mt-10 grid gap-10 border-t border-current/20 pt-8 lg:grid-cols-[1.2fr_1fr] lg:gap-16">
            <div>
                <p class="site-body max-w-xl opacity-75">{{ $body }}</p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    @if ($primary)
                        <a href="{{ $primaryHref }}" @if (! str_starts_with($primaryHref, '#')) wire:navigate @endif
                           class="site-btn group inline-flex items-center justify-center gap-3 px-7 py-4 text-sm font-bold transition hover:opacity-85"
                           style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                            {{ $primary }}
                            <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                        </a>
                    @endif

                    @if ($secondary)
                        <a href="{{ $secondaryHref }}" @if (! str_starts_with($secondaryHref, '#')) wire:navigate @endif
                           class="site-btn inline-flex items-center justify-center gap-3 border border-current/35 px-7 py-4 text-sm font-bold transition hover:border-current">
                            {{ $secondary }}
                        </a>
                    @endif
                </div>
            </div>

            @if ($stats?->isNotEmpty())
                <dl class="site-card grid grid-cols-1 gap-px self-start overflow-hidden border border-current/20 sm:grid-cols-3 lg:grid-cols-1"
                    style="background: color-mix(in srgb, currentColor 20%, transparent);">
                    @foreach ($stats as $stat)
                        <div class="site-inverse px-5 py-5">
                            <dt class="display text-2xl sm:text-3xl">{{ $stat['value'] ?? '' }}</dt>
                            <dd class="mt-1 text-sm leading-snug opacity-55">{{ $stat['label'] ?? '' }}</dd>
                        </div>
                    @endforeach
                </dl>
            @endif
        </div>
    </div>
</section>
