<?php

use App\Models\SiteContent;
use App\Models\SiteItem;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts.public')] #[Title('Digital agency in Abuja')] class extends Component
{
    public function with(): array
    {
        return [
            't' => SiteContent::allValues(),
            ...SiteItem::forPage('home', ['stats', 'services', 'approach', 'arms', 'testimonials']),
        ];
    }
}; ?>

<div class="site antialiased">
    <x-site.nav active="home" />

    <x-site.hero
        :eyebrow="$t['home.hero.eyebrow'] ?? null"
        :line1="$t['home.hero.line1'] ?? null"
        :line2="$t['home.hero.line2'] ?? null"
        :line3="$t['home.hero.line3'] ?? null"
        :body="$t['home.hero.body'] ?? null"
        :primary="$t['home.hero.cta_primary'] ?? null"
        primary-href="#contact"
        :secondary="$t['home.hero.cta_secondary'] ?? null"
        secondary-href="#services"
        :stats="$stats"
    />

    @if (filled($t['home.trust.label'] ?? null))
        <section class="border-b" style="border-color: var(--site-border);">
            <div class="site-shell px-5 py-6 sm:px-8">
                <p class="eyebrow text-center opacity-45">{{ $t['home.trust.label'] }}</p>
            </div>
        </section>
    @endif

    {{-- ─── Services ───────────────────────────────────────────────── --}}
    <section id="services" class="scroll-mt-24">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <x-site.heading
                :eyebrow="$t['home.services.eyebrow'] ?? null"
                :heading="$t['home.services.heading'] ?? null"
                :body="$t['home.services.body'] ?? null"
            />

            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                    <div class="site-card border p-7 transition hover:border-current sm:p-8"
                         style="border-color: var(--site-border);">
                        <h3 class="display text-xl sm:text-2xl">{{ $service['title'] ?? '' }}</h3>
                        <p class="site-body mt-3 opacity-65">{{ $service['body'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── How we work ────────────────────────────────────────────── --}}
    <section class="site-muted border-t" style="border-color: var(--site-border);">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <x-site.heading
                :eyebrow="$t['home.approach.eyebrow'] ?? null"
                :heading="$t['home.approach.heading'] ?? null"
                :body="$t['home.approach.body'] ?? null"
            />
            <x-site.steps :items="$approach" />
        </div>
    </section>

    {{-- ─── The other two arms ─────────────────────────────────────── --}}
    <section>
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <x-site.heading
                :eyebrow="$t['home.arms.eyebrow'] ?? null"
                :heading="$t['home.arms.heading'] ?? null"
                :body="$t['home.arms.body'] ?? null"
            />

            <div class="mt-12 grid gap-5 lg:grid-cols-2">
                @foreach ($arms as $arm)
                    <a href="{{ route($arm['link'] ?? 'home') }}" wire:navigate
                       class="site-inverse site-card group flex flex-col justify-between p-8 transition hover:opacity-90 sm:p-10">
                        <div>
                            <h3 class="display site-subheading">{{ $arm['title'] ?? '' }}</h3>
                            <p class="site-body mt-4 max-w-md opacity-70">{{ $arm['body'] ?? '' }}</p>
                        </div>
                        <span class="mt-8 inline-flex items-center gap-2 border-t border-current/25 pt-6 text-sm font-bold">
                            {{ $arm['label'] ?? 'Learn more' }}
                            <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── Testimonials ───────────────────────────────────────────── --}}
    @if ($testimonials->isNotEmpty())
        <section class="site-muted border-t" style="border-color: var(--site-border);">
            <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
                <div class="grid gap-5 lg:grid-cols-3">
                    @foreach ($testimonials as $quote)
                        <figure class="site site-card border p-7" style="border-color: var(--site-border);">
                            <blockquote class="site-body opacity-80">&ldquo;{{ $quote['quote'] ?? '' }}&rdquo;</blockquote>
                            <figcaption class="mt-5 border-t pt-4" style="border-color: var(--site-border);">
                                <p class="text-sm font-bold">{{ $quote['name'] ?? '' }}</p>
                                <p class="text-sm opacity-50">{{ $quote['role'] ?? '' }}</p>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div id="contact" class="scroll-mt-24"></div>
    <x-site.cta
        :heading="$t['home.cta.heading'] ?? null"
        :body="$t['home.cta.body'] ?? null"
        :button="$t['home.cta.button'] ?? null"
        :href="'mailto:'.($t['global.contact.email'] ?? '')"
    />

    <x-site.footer />
</div>
