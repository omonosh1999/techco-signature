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
    // Bullet lists are stored one-per-line so the admin never has to touch HTML.
    $lines = fn (?string $value) => collect(preg_split('/\r\n|\r|\n/', (string) $value))
        ->map(fn ($line) => trim($line))
        ->filter()
        ->values();
@endphp

<div class="bg-white text-black antialiased">

    {{-- ─── Navigation ─────────────────────────────────────────────── --}}
    <header class="sticky top-0 z-50 border-b border-white/15 bg-black text-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 py-4 sm:px-8">
            <a href="#top" class="display text-xl tracking-tight sm:text-2xl">
                {{ $t['brand.name'] ?? 'TechCo Signature' }}
            </a>

            <div class="hidden items-center gap-8 text-sm font-medium lg:flex">
                <a href="#how" class="text-white/70 transition hover:text-white">How it works</a>
                <a href="#services" class="text-white/70 transition hover:text-white">Services</a>
                <a href="#programmes" class="text-white/70 transition hover:text-white">Programmes</a>
                <a href="#join" class="text-white/70 transition hover:text-white">Join</a>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('login') }}" wire:navigate
                   class="hidden rounded-full px-4 py-2 text-sm font-semibold text-white/80 transition hover:text-white sm:block">
                    Log in
                </a>
                <a href="#join"
                   class="rounded-full bg-white px-5 py-2 text-sm font-bold text-black transition hover:bg-white/85">
                    Sign up
                </a>
            </div>
        </nav>
    </header>

    {{-- ─── Hero ───────────────────────────────────────────────────── --}}
    <section id="top" class="bg-black text-white">
        <div class="mx-auto max-w-7xl px-5 pt-14 pb-16 sm:px-8 sm:pt-20 sm:pb-24">
            <p class="eyebrow text-white/50">{{ $t['hero.eyebrow'] ?? '' }}</p>

            <h1 class="display mt-6 text-[clamp(2.75rem,12vw,10rem)]">
                <span class="block">{{ $t['hero.line1'] ?? '' }}</span>
                <span class="block">{{ $t['hero.line2'] ?? '' }}</span>
                <span class="block text-white/35">{{ $t['hero.line3'] ?? '' }}</span>
            </h1>

            <div class="mt-10 grid gap-10 border-t border-white/15 pt-8 lg:grid-cols-[1.2fr_1fr] lg:gap-16">
                <div>
                    <p class="max-w-xl text-base leading-relaxed text-white/70 sm:text-lg">
                        {{ $t['hero.body'] ?? '' }}
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="#join"
                           class="group inline-flex items-center justify-center gap-3 rounded-full bg-white px-7 py-4 text-sm font-bold text-black transition hover:bg-white/85">
                            {{ $t['hero.cta_primary'] ?? '' }}
                            <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                        </a>
                        <a href="#join"
                           class="inline-flex items-center justify-center gap-3 rounded-full border border-white/30 px-7 py-4 text-sm font-bold text-white transition hover:border-white hover:bg-white/5">
                            {{ $t['hero.cta_secondary'] ?? '' }}
                        </a>
                    </div>
                </div>

                @if ($stats->isNotEmpty())
                    <dl class="grid grid-cols-1 gap-px self-start overflow-hidden rounded-2xl border border-white/15 bg-white/15 sm:grid-cols-3 lg:grid-cols-1">
                        @foreach ($stats as $stat)
                            <div class="bg-black px-5 py-5">
                                <dt class="display text-2xl sm:text-3xl">{{ $stat['value'] ?? '' }}</dt>
                                <dd class="mt-1 text-xs leading-snug text-white/50">{{ $stat['label'] ?? '' }}</dd>
                            </div>
                        @endforeach
                    </dl>
                @endif
            </div>
        </div>
    </section>

    {{-- ─── Trust strip ────────────────────────────────────────────── --}}
    @if (filled($t['trust.label'] ?? null))
        <section class="border-y border-black/10 bg-white">
            <div class="mx-auto max-w-7xl px-5 py-6 sm:px-8">
                <p class="eyebrow text-center text-black/40">{{ $t['trust.label'] }}</p>
            </div>
        </section>
    @endif

    {{-- ─── How it works ───────────────────────────────────────────── --}}
    <section id="how" class="bg-white">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-28">
            <div class="grid gap-8 lg:grid-cols-[1.4fr_1fr] lg:gap-16">
                <div>
                    <p class="eyebrow text-black/40">{{ $t['process.eyebrow'] ?? '' }}</p>
                    <h2 class="display mt-4 text-[clamp(2rem,6vw,4.5rem)]">{{ $t['process.heading'] ?? '' }}</h2>
                </div>
                <p class="self-end text-base leading-relaxed text-black/60">{{ $t['process.body'] ?? '' }}</p>
            </div>

            <div class="mt-14 border-t border-black/10">
                @foreach ($steps as $step)
                    <div class="group grid gap-4 border-b border-black/10 py-7 sm:grid-cols-[auto_1fr_auto] sm:items-start sm:gap-8">
                        <span class="display text-3xl text-black/20 sm:w-20 sm:text-5xl">{{ $step['number'] ?? '' }}</span>
                        <div>
                            <h3 class="text-lg font-bold sm:text-xl">{{ $step['title'] ?? '' }}</h3>
                            <p class="mt-2 max-w-2xl text-sm leading-relaxed text-black/60 sm:text-base">{{ $step['body'] ?? '' }}</p>
                        </div>
                        <span aria-hidden="true"
                              class="hidden h-11 w-11 shrink-0 items-center justify-center rounded-full border border-black/15 text-lg transition group-hover:bg-black group-hover:text-white sm:flex">
                            &rarr;
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── Services ───────────────────────────────────────────────── --}}
    <section id="services" class="border-t border-black/10 bg-[#f4f4f2]">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-28">
            <div class="grid gap-8 lg:grid-cols-[1.4fr_1fr] lg:gap-16">
                <div>
                    <p class="eyebrow text-black/40">{{ $t['services.eyebrow'] ?? '' }}</p>
                    <h2 class="display mt-4 text-[clamp(2rem,6vw,4.5rem)]">{{ $t['services.heading'] ?? '' }}</h2>
                </div>
                <p class="self-end text-base leading-relaxed text-black/60">{{ $t['services.body'] ?? '' }}</p>
            </div>

            <div class="mt-14 grid gap-5 sm:grid-cols-2">
                @foreach ($services as $service)
                    <div class="rounded-2xl border border-black/10 bg-white p-7 transition hover:border-black/40 sm:p-9">
                        <h3 class="display text-xl sm:text-2xl">{{ $service['title'] ?? '' }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-black/60 sm:text-base">{{ $service['body'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── Programmes ─────────────────────────────────────────────── --}}
    <section id="programmes" class="bg-white">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-28">
            <p class="eyebrow text-black/40">{{ $t['programmes.eyebrow'] ?? '' }}</p>
            <h2 class="display mt-4 text-[clamp(2rem,6vw,4.5rem)]">{{ $t['programmes.heading'] ?? '' }}</h2>

            <div class="mt-12 grid gap-5 lg:grid-cols-2">
                @foreach ($programmes as $programme)
                    <div class="flex flex-col justify-between rounded-3xl bg-black p-8 text-white sm:p-10">
                        <div>
                            <h3 class="display text-[clamp(1.75rem,4vw,3rem)]">{{ $programme['title'] ?? '' }}</h3>
                            <p class="mt-4 max-w-md text-sm leading-relaxed text-white/65 sm:text-base">{{ $programme['body'] ?? '' }}</p>
                        </div>
                        <p class="display mt-8 border-t border-white/20 pt-6 text-2xl sm:text-3xl">{{ $programme['price'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── Band ───────────────────────────────────────────────────── --}}
    <section class="bg-black text-white">
        <div class="mx-auto max-w-7xl px-5 py-20 text-center sm:px-8 sm:py-28">
            <h2 class="display text-[clamp(2.5rem,11vw,9rem)]">
                <span class="block">{{ $t['band.line1'] ?? '' }}</span>
                <span class="block text-white/35">{{ $t['band.line2'] ?? '' }}</span>
            </h2>
            <a href="#join"
               class="group mt-10 inline-flex items-center gap-3 rounded-full bg-white px-8 py-4 text-sm font-bold text-black transition hover:bg-white/85">
                {{ $t['band.cta'] ?? '' }}
                <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
            </a>
        </div>
    </section>

    {{-- ─── Join — the two doors ───────────────────────────────────── --}}
    <section id="join" class="scroll-mt-20 border-t border-black/10 bg-[#f4f4f2]">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-28">
            <p class="eyebrow text-black/40">{{ $t['paths.eyebrow'] ?? '' }}</p>
            <h2 class="display mt-4 text-[clamp(2rem,6vw,4.5rem)]">{{ $t['paths.heading'] ?? '' }}</h2>

            <div class="mt-12 grid gap-5 lg:grid-cols-2">

                {{-- Job seeker --}}
                <div class="flex flex-col rounded-3xl border-2 border-black bg-white p-8 sm:p-10">
                    <h3 class="display text-[clamp(1.6rem,3.5vw,2.5rem)]">{{ $t['paths.candidate_title'] ?? '' }}</h3>
                    <p class="mt-4 text-sm leading-relaxed text-black/65 sm:text-base">{{ $t['paths.candidate_body'] ?? '' }}</p>

                    <ul class="mt-7 space-y-3 border-t border-black/10 pt-7">
                        @foreach ($lines($t['paths.candidate_points'] ?? null) as $point)
                            <li class="flex gap-3 text-sm sm:text-base">
                                <span aria-hidden="true" class="font-bold">&rarr;</span>
                                <span class="text-black/75">{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('join.candidate') }}" wire:navigate
                       class="group mt-9 inline-flex items-center justify-center gap-3 rounded-full bg-black px-7 py-4 text-sm font-bold text-white transition hover:bg-black/85">
                        {{ $t['paths.candidate_cta'] ?? '' }}
                        <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>

                {{-- Agent --}}
                <div class="flex flex-col rounded-3xl bg-black p-8 text-white sm:p-10">
                    <h3 class="display text-[clamp(1.6rem,3.5vw,2.5rem)]">{{ $t['paths.agent_title'] ?? '' }}</h3>
                    <p class="mt-4 text-sm leading-relaxed text-white/65 sm:text-base">{{ $t['paths.agent_body'] ?? '' }}</p>

                    <ul class="mt-7 space-y-3 border-t border-white/20 pt-7">
                        @foreach ($lines($t['paths.agent_points'] ?? null) as $point)
                            <li class="flex gap-3 text-sm sm:text-base">
                                <span aria-hidden="true" class="font-bold">&rarr;</span>
                                <span class="text-white/75">{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('join.agent') }}" wire:navigate
                       class="group mt-9 inline-flex items-center justify-center gap-3 rounded-full bg-white px-7 py-4 text-sm font-bold text-black transition hover:bg-white/85">
                        {{ $t['paths.agent_cta'] ?? '' }}
                        <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Team ───────────────────────────────────────────────────── --}}
    @if ($team->isNotEmpty())
        <section class="bg-white">
            <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-28">
                <p class="eyebrow text-black/40">{{ $t['team.eyebrow'] ?? '' }}</p>
                <h2 class="display mt-4 text-[clamp(2rem,6vw,4.5rem)]">{{ $t['team.heading'] ?? '' }}</h2>

                <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($team as $member)
                        <div class="rounded-2xl border border-black/10 p-7">
                            <div class="display flex h-16 w-16 items-center justify-center rounded-full bg-black text-xl text-white">
                                {{ str($member['name'] ?? '?')->explode(' ')->take(2)->map(fn ($p) => str($p)->substr(0, 1))->implode('') }}
                            </div>
                            <h3 class="mt-5 text-lg font-bold">{{ $member['name'] ?? '' }}</h3>
                            <p class="eyebrow mt-1 text-black/40">{{ $member['role'] ?? '' }}</p>
                            <p class="mt-3 text-sm leading-relaxed text-black/60">{{ $member['bio'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ─── Testimonials ───────────────────────────────────────────── --}}
    @if ($testimonials->isNotEmpty())
        <section class="border-t border-black/10 bg-[#f4f4f2]">
            <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-28">
                <p class="eyebrow text-black/40">{{ $t['testimonials.eyebrow'] ?? '' }}</p>
                <h2 class="display mt-4 text-[clamp(2rem,6vw,4.5rem)]">{{ $t['testimonials.heading'] ?? '' }}</h2>

                <div class="mt-12 grid gap-5 lg:grid-cols-3">
                    @foreach ($testimonials as $quote)
                        <figure class="rounded-2xl border border-black/10 bg-white p-7">
                            <blockquote class="text-sm leading-relaxed text-black/75 sm:text-base">“{{ $quote['quote'] ?? '' }}”</blockquote>
                            <figcaption class="mt-5 border-t border-black/10 pt-4">
                                <p class="text-sm font-bold">{{ $quote['name'] ?? '' }}</p>
                                <p class="text-xs text-black/50">{{ $quote['role'] ?? '' }}</p>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ─── Closing CTA ────────────────────────────────────────────── --}}
    <section class="bg-black text-white">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 sm:py-28">
            <div class="grid gap-8 lg:grid-cols-[1.5fr_1fr] lg:items-end lg:gap-16">
                <div>
                    <h2 class="display text-[clamp(2.25rem,7vw,6rem)]">{{ $t['cta.heading'] ?? '' }}</h2>
                    <p class="mt-5 max-w-lg text-base text-white/65">{{ $t['cta.body'] ?? '' }}</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:justify-end">
                    <a href="#join"
                       class="inline-flex items-center justify-center gap-3 rounded-full bg-white px-8 py-4 text-sm font-bold text-black transition hover:bg-white/85">
                        {{ $t['cta.button'] ?? '' }}
                    </a>
                    <a href="tel:{{ str_replace(' ', '', $t['contact.phone'] ?? '') }}"
                       class="inline-flex items-center justify-center gap-3 rounded-full border border-white/30 px-8 py-4 text-sm font-bold transition hover:border-white hover:bg-white/5">
                        {{ $t['contact.phone'] ?? '' }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Footer ─────────────────────────────────────────────────── --}}
    <footer class="border-t border-white/15 bg-black text-white">
        <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                <div class="lg:col-span-2">
                    <p class="display text-2xl">{{ $t['brand.name'] ?? '' }}</p>
                    <p class="mt-2 text-sm text-white/50">{{ $t['brand.tagline'] ?? '' }}</p>
                    <p class="mt-6 max-w-sm text-xs leading-relaxed text-white/40">{{ $t['footer.note'] ?? '' }}</p>
                </div>

                <div>
                    <p class="eyebrow text-white/40">Explore</p>
                    <ul class="mt-4 space-y-2 text-sm text-white/70">
                        <li><a href="#how" class="transition hover:text-white">How it works</a></li>
                        <li><a href="#services" class="transition hover:text-white">Services</a></li>
                        <li><a href="#programmes" class="transition hover:text-white">Programmes</a></li>
                        <li><a href="#join" class="transition hover:text-white">Join</a></li>
                        <li><a href="{{ route('login') }}" wire:navigate class="transition hover:text-white">Log in</a></li>
                    </ul>
                </div>

                <div>
                    <p class="eyebrow text-white/40">Contact</p>
                    <ul class="mt-4 space-y-2 text-sm text-white/70">
                        <li><a href="mailto:{{ $t['contact.email'] ?? '' }}" class="transition hover:text-white">{{ $t['contact.email'] ?? '' }}</a></li>
                        <li><a href="tel:{{ str_replace(' ', '', $t['contact.phone'] ?? '') }}" class="transition hover:text-white">{{ $t['contact.phone'] ?? '' }}</a></li>
                        <li class="text-white/50">{{ $t['contact.address'] ?? '' }}</li>
                        <li class="text-white/50">{{ $t['contact.hours'] ?? '' }}</li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 flex flex-col gap-2 border-t border-white/15 pt-6 text-xs text-white/40 sm:flex-row sm:items-center sm:justify-between">
                <p>&copy; {{ date('Y') }} {{ $t['brand.name'] ?? '' }}. All rights reserved.</p>
                <p>{{ $t['contact.rc'] ?? '' }} &nbsp;·&nbsp; {{ $t['contact.tin'] ?? '' }}</p>
            </div>
        </div>
    </footer>
</div>
