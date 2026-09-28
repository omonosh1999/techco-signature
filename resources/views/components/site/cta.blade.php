@props(['heading' => null, 'body' => null, 'button' => null, 'href' => '#'])

@php
    $t = \App\Models\SiteContent::allValues();
    $tel = str_replace(' ', '', $t['global.contact.phone'] ?? '');
@endphp

<section class="site-inverse">
    <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
        <div class="grid gap-8 lg:grid-cols-[1.5fr_1fr] lg:items-end lg:gap-16">
            <div>
                <h2 class="display site-heading">{{ $heading }}</h2>
                <p class="site-body mt-5 max-w-lg opacity-70">{{ $body }}</p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row lg:justify-end">
                @if ($button)
                    <a href="{{ $href }}" @if (! str_starts_with($href, '#')) wire:navigate @endif
                       class="site-btn inline-flex items-center justify-center gap-3 px-8 py-4 text-sm font-bold transition hover:opacity-85"
                       style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                        {{ $button }}
                    </a>
                @endif

                <a href="tel:{{ $tel }}"
                   class="site-btn inline-flex items-center justify-center gap-3 border border-current/35 px-8 py-4 text-sm font-bold transition hover:border-current">
                    {{ $t['global.contact.phone'] ?? '' }}
                </a>
            </div>
        </div>
    </div>
</section>
