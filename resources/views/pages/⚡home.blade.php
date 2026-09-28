<?php

use App\Models\SiteContent;
use App\Models\SiteItem;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts.public')] #[Title('Trained first. Then hired.')] class extends Component
{
    public function with(): array
    {
        return [
            't' => SiteContent::allValues(),
            'stats' => SiteItem::collection('stats'),
            'steps' => SiteItem::collection('process'),
            'services' => SiteItem::collection('services'),
            'programmes' => SiteItem::collection('programmes'),
            'team' => SiteItem::collection('team'),
            'testimonials' => SiteItem::collection('testimonials'),
        ];
    }
}; ?>

@php
    // Lists are stored one-per-line so an admin never has to touch HTML.
    $lines = fn (?string $value) => collect(preg_split('/\r\n|\r|\n/', (string) $value))
        ->map(fn ($line) => trim($line))
        ->filter()
        ->values();
@endphp

<div class="site antialiased">

    {{-- ─── Navigation ─────────────────────────────────────────────── --}}
    <header class="site-inverse sticky top-0 z-50">
        <nav class="site-shell flex items-center justify-between gap-6 px-5 py-4 sm:px-8">
            <a href="#top" class="display text-xl sm:text-2xl">{{ $t['brand.name'] ?? '' }}</a>

            <div class="hidden items-center gap-8 text-sm font-semibold lg:flex">
                <a href="#how" class="opacity-65 transition hover:opacity-100">{{ $t['nav.link_1'] ?? '' }}</a>
                <a href="#services" class="opacity-65 transition hover:opacity-100">{{ $t['nav.link_2'] ?? '' }}</a>
                <a href="#programmes" class="opacity-65 transition hover:opacity-100">{{ $t['nav.link_3'] ?? '' }}</a>
                <a href="#join" class="opacity-65 transition hover:opacity-100">{{ $t['nav.link_4'] ?? '' }}</a>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('login') }}" wire:navigate
                   class="site-btn hidden px-4 py-2 text-sm font-semibold opacity-75 transition hover:opacity-100 sm:block">
                    {{ $t['nav.login'] ?? '' }}
                </a>
                <a href="#join"
                   class="site-btn px-5 py-2.5 text-sm font-bold transition hover:opacity-85"
                   style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                    {{ $t['nav.signup'] ?? '' }}
                </a>
            </div>
        </nav>
    </header>

    {{-- ─── Hero ───────────────────────────────────────────────────── --}}
    <section id="top" class="site-inverse">
        <div class="site-shell px-5 pt-14 pb-16 sm:px-8 sm:pt-20 sm:pb-24">
            <p class="eyebrow opacity-55">{{ $t['hero.eyebrow'] ?? '' }}</p>

            <h1 class="display site-display mt-6">
                <span class="block">{{ $t['hero.line1'] ?? '' }}</span>
                <span class="block">{{ $t['hero.line2'] ?? '' }}</span>
                <span class="block opacity-40">{{ $t['hero.line3'] ?? '' }}</span>
            </h1>

            <div class="mt-10 grid gap-10 border-t border-current/20 pt-8 lg:grid-cols-[1.2fr_1fr] lg:gap-16">
                <div>
                    <p class="site-body max-w-xl opacity-75">{{ $t['hero.body'] ?? '' }}</p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="#join"
                           class="site-btn group inline-flex items-center justify-center gap-3 px-7 py-4 text-sm font-bold transition hover:opacity-85"
                           style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                            {{ $t['hero.cta_primary'] ?? '' }}
                            <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                        </a>
                        <a href="#join"
                           class="site-btn inline-flex items-center justify-center gap-3 border border-current/35 px-7 py-4 text-sm font-bold transition hover:border-current">
                            {{ $t['hero.cta_secondary'] ?? '' }}
                        </a>
                    </div>
                </div>

                @if ($stats->isNotEmpty())
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

    {{-- ─── Trust strip ────────────────────────────────────────────── --}}
    @if (filled($t['trust.label'] ?? null))
        <section class="border-b" style="border-color: var(--site-border);">
            <div class="site-shell px-5 py-6 sm:px-8">
                <p class="eyebrow text-center opacity-45">{{ $t['trust.label'] }}</p>
            </div>
        </section>
    @endif

    {{-- ─── How it works ───────────────────────────────────────────── --}}
    <section id="how" class="scroll-mt-20">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <div class="grid gap-8 lg:grid-cols-[1.4fr_1fr] lg:gap-16">
                <div>
                    <p class="eyebrow opacity-45">{{ $t['process.eyebrow'] ?? '' }}</p>
                    <h2 class="display site-heading mt-4">{{ $t['process.heading'] ?? '' }}</h2>
                </div>
                <p class="site-body self-end opacity-65">{{ $t['process.body'] ?? '' }}</p>
            </div>

            <div class="mt-14 border-t" style="border-color: var(--site-border);">
                @foreach ($steps as $step)
                    <div class="group grid gap-4 border-b py-8 sm:grid-cols-[auto_1fr_auto] sm:items-start sm:gap-8"
                         style="border-color: var(--site-border);">
                        <span class="display text-3xl opacity-20 sm:w-20 sm:text-5xl">{{ $step['number'] ?? '' }}</span>
                        <div>
                            <h3 class="text-xl font-bold sm:text-2xl">{{ $step['title'] ?? '' }}</h3>
                            <p class="site-body mt-2 max-w-2xl opacity-65">{{ $step['body'] ?? '' }}</p>
                        </div>
                        <span aria-hidden="true"
                              class="hidden h-11 w-11 shrink-0 items-center justify-center rounded-full border text-lg transition group-hover:bg-[var(--site-inverse-bg)] group-hover:text-[var(--site-inverse-fg)] sm:flex"
                              style="border-color: var(--site-border);">&rarr;</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── Services ───────────────────────────────────────────────── --}}
    <section id="services" class="site-muted scroll-mt-20 border-t" style="border-color: var(--site-border);">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <div class="grid gap-8 lg:grid-cols-[1.4fr_1fr] lg:gap-16">
                <div>
                    <p class="eyebrow opacity-45">{{ $t['services.eyebrow'] ?? '' }}</p>
                    <h2 class="display site-heading mt-4">{{ $t['services.heading'] ?? '' }}</h2>
                </div>
                <p class="site-body self-end opacity-65">{{ $t['services.body'] ?? '' }}</p>
            </div>

            <div class="mt-14 grid gap-5 sm:grid-cols-2">
                @foreach ($services as $service)
                    <div class="site site-card border p-7 transition hover:border-current sm:p-9"
                         style="border-color: var(--site-border);">
                        <h3 class="display text-2xl sm:text-3xl">{{ $service['title'] ?? '' }}</h3>
                        <p class="site-body mt-3 opacity-65">{{ $service['body'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── Programmes ─────────────────────────────────────────────── --}}
    <section id="programmes" class="scroll-mt-20">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <p class="eyebrow opacity-45">{{ $t['programmes.eyebrow'] ?? '' }}</p>
            <h2 class="display site-heading mt-4">{{ $t['programmes.heading'] ?? '' }}</h2>

            <div class="mt-12 grid gap-5 lg:grid-cols-2">
                @foreach ($programmes as $programme)
                    <div class="site-inverse site-card flex flex-col justify-between p-8 sm:p-10">
                        <div>
                            <h3 class="display site-subheading">{{ $programme['title'] ?? '' }}</h3>
                            <p class="site-body mt-4 max-w-md opacity-70">{{ $programme['body'] ?? '' }}</p>
                        </div>
                        <a href="{{ route('join.candidate') }}" wire:navigate
                           class="group mt-8 inline-flex items-center gap-2 border-t border-current/25 pt-6 text-sm font-bold">
                            {{ $t['programmes.link_label'] ?? '' }}
                            <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── No hidden fees ─────────────────────────────────────────── --}}
    <section class="site-muted border-y" style="border-color: var(--site-border);">
        <div class="site-shell px-5 py-16 sm:px-8 sm:py-20">
            <div class="grid gap-8 lg:grid-cols-[1fr_1.3fr] lg:gap-16">
                <h2 class="display site-subheading">{{ $t['fees.heading'] ?? '' }}</h2>
                <div>
                    <p class="site-bullet opacity-80">{{ $t['fees.body'] ?? '' }}</p>
                    <p class="mt-4 text-sm opacity-50">{{ $t['fees.note'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Band ───────────────────────────────────────────────────── --}}
    <section class="site-inverse">
        <div class="site-shell px-5 py-20 text-center sm:px-8 sm:py-28">
            <h2 class="display site-display">
                <span class="block">{{ $t['band.line1'] ?? '' }}</span>
                <span class="block opacity-40">{{ $t['band.line2'] ?? '' }}</span>
            </h2>
            <a href="#join"
               class="site-btn group mt-10 inline-flex items-center gap-3 px-8 py-4 text-sm font-bold transition hover:opacity-85"
               style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                {{ $t['band.cta'] ?? '' }}
                <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
            </a>
        </div>
    </section>

    {{-- ─── Join — the two doors ───────────────────────────────────── --}}
    <section id="join" class="site-muted scroll-mt-20 border-b" style="border-color: var(--site-border);">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <p class="eyebrow opacity-45">{{ $t['paths.eyebrow'] ?? '' }}</p>
            <h2 class="display site-heading mt-4">{{ $t['paths.heading'] ?? '' }}</h2>

            <div class="mt-12 grid gap-5 lg:grid-cols-2">

                {{-- Job seeker --}}
                <div class="site site-card flex flex-col border-2 border-current p-8 sm:p-10">
                    <h3 class="display site-subheading">{{ $t['paths.candidate_title'] ?? '' }}</h3>
                    <p class="site-body mt-4 opacity-70">{{ $t['paths.candidate_body'] ?? '' }}</p>

                    <ul class="mt-8 space-y-4 border-t pt-8" style="border-color: var(--site-border);">
                        @foreach ($lines($t['paths.candidate_points'] ?? null) as $point)
                            <li class="site-bullet flex gap-3">
                                <span aria-hidden="true" class="font-bold">&rarr;</span>
                                <span class="opacity-80">{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('join.candidate') }}" wire:navigate
                       class="site-btn site-inverse group mt-9 inline-flex items-center justify-center gap-3 px-7 py-4 text-sm font-bold transition hover:opacity-85">
                        {{ $t['paths.candidate_cta'] ?? '' }}
                        <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>

                {{-- Agent --}}
                <div class="site-inverse site-card flex flex-col p-8 sm:p-10">
                    <h3 class="display site-subheading">{{ $t['paths.agent_title'] ?? '' }}</h3>
                    <p class="site-body mt-4 opacity-70">{{ $t['paths.agent_body'] ?? '' }}</p>

                    <ul class="mt-8 space-y-4 border-t border-current/25 pt-8">
                        @foreach ($lines($t['paths.agent_points'] ?? null) as $point)
                            <li class="site-bullet flex gap-3">
                                <span aria-hidden="true" class="font-bold">&rarr;</span>
                                <span class="opacity-80">{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('join.agent') }}" wire:navigate
                       class="site-btn group mt-9 inline-flex items-center justify-center gap-3 px-7 py-4 text-sm font-bold transition hover:opacity-85"
                       style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                        {{ $t['paths.agent_cta'] ?? '' }}
                        <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Team ───────────────────────────────────────────────────── --}}
    @if ($team->isNotEmpty())
        <section>
            <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
                <p class="eyebrow opacity-45">{{ $t['team.eyebrow'] ?? '' }}</p>
                <h2 class="display site-heading mt-4">{{ $t['team.heading'] ?? '' }}</h2>

                <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($team as $member)
                        <div class="site-card border p-7" style="border-color: var(--site-border);">
                            <div class="site-inverse display flex h-16 w-16 items-center justify-center rounded-full text-xl">
                                {{ str($member['name'] ?? '?')->explode(' ')->take(2)->map(fn ($p) => str($p)->substr(0, 1))->implode('') }}
                            </div>
                            <h3 class="mt-5 text-lg font-bold">{{ $member['name'] ?? '' }}</h3>
                            <p class="eyebrow mt-1 opacity-45">{{ $member['role'] ?? '' }}</p>
                            <p class="site-body mt-3 opacity-65">{{ $member['bio'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ─── Testimonials ───────────────────────────────────────────── --}}
    @if ($testimonials->isNotEmpty())
        <section class="site-muted border-t" style="border-color: var(--site-border);">
            <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
                <p class="eyebrow opacity-45">{{ $t['testimonials.eyebrow'] ?? '' }}</p>
                <h2 class="display site-heading mt-4">{{ $t['testimonials.heading'] ?? '' }}</h2>

                <div class="mt-12 grid gap-5 lg:grid-cols-3">
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

    {{-- ─── Closing CTA ────────────────────────────────────────────── --}}
    <section class="site-inverse">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <div class="grid gap-8 lg:grid-cols-[1.5fr_1fr] lg:items-end lg:gap-16">
                <div>
                    <h2 class="display site-heading">{{ $t['cta.heading'] ?? '' }}</h2>
                    <p class="site-body mt-5 max-w-lg opacity-70">{{ $t['cta.body'] ?? '' }}</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:justify-end">
                    <a href="#join"
                       class="site-btn inline-flex items-center justify-center gap-3 px-8 py-4 text-sm font-bold transition hover:opacity-85"
                       style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                        {{ $t['cta.button'] ?? '' }}
                    </a>
                    <a href="tel:{{ str_replace(' ', '', $t['contact.phone'] ?? '') }}"
                       class="site-btn inline-flex items-center justify-center gap-3 border border-current/35 px-8 py-4 text-sm font-bold transition hover:border-current">
                        {{ $t['contact.phone'] ?? '' }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Footer ─────────────────────────────────────────────────── --}}
    <footer class="site-inverse border-t border-current/20">
        <div class="site-shell px-5 py-14 sm:px-8">
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                <div class="lg:col-span-2">
                    <p class="display text-2xl">{{ $t['brand.name'] ?? '' }}</p>
                    <p class="mt-2 text-sm opacity-55">{{ $t['brand.tagline'] ?? '' }}</p>
                    <p class="mt-6 max-w-sm text-sm leading-relaxed opacity-45">{{ $t['footer.note'] ?? '' }}</p>
                </div>

                <div>
                    <p class="eyebrow opacity-45">Explore</p>
                    <ul class="mt-4 space-y-2.5 text-sm opacity-75">
                        <li><a href="#how" class="transition hover:underline">{{ $t['nav.link_1'] ?? '' }}</a></li>
                        <li><a href="#services" class="transition hover:underline">{{ $t['nav.link_2'] ?? '' }}</a></li>
                        <li><a href="#programmes" class="transition hover:underline">{{ $t['nav.link_3'] ?? '' }}</a></li>
                        <li><a href="#join" class="transition hover:underline">{{ $t['nav.link_4'] ?? '' }}</a></li>
                        <li><a href="{{ route('login') }}" wire:navigate class="transition hover:underline">{{ $t['nav.login'] ?? '' }}</a></li>
                    </ul>
                </div>

                <div>
                    <p class="eyebrow opacity-45">Contact</p>
                    <ul class="mt-4 space-y-2.5 text-sm opacity-75">
                        <li><a href="mailto:{{ $t['contact.email'] ?? '' }}" class="transition hover:underline">{{ $t['contact.email'] ?? '' }}</a></li>
                        <li><a href="tel:{{ str_replace(' ', '', $t['contact.phone'] ?? '') }}" class="transition hover:underline">{{ $t['contact.phone'] ?? '' }}</a></li>
                        <li class="opacity-75">{{ $t['contact.address'] ?? '' }}</li>
                        <li class="opacity-75">{{ $t['contact.hours'] ?? '' }}</li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 flex flex-col gap-2 border-t border-current/20 pt-6 text-sm opacity-45 sm:flex-row sm:items-center sm:justify-between">
                <p>&copy; {{ date('Y') }} {{ $t['brand.name'] ?? '' }}. All rights reserved.</p>
                <p>{{ $t['contact.rc'] ?? '' }} &nbsp;·&nbsp; {{ $t['contact.tin'] ?? '' }}</p>
            </div>
        </div>
    </footer>
</div>
