<?php

use App\Models\SiteContent;
use App\Models\SiteItem;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts.public')] #[Title('Recruitment')] class extends Component
{
    public function with(): array
    {
        return [
            't' => SiteContent::allValues(),
            ...SiteItem::forPage('recruitment', ['stats', 'steps']),
        ];
    }
}; ?>

@php
    $lines = fn (?string $value) => collect(preg_split('/\r\n|\r|\n/', (string) $value))
        ->map(fn ($line) => trim($line))
        ->filter()
        ->values();

    // The three doors share a shape, so they are described once and looped.
    $doors = [
        ['key' => 'employer', 'href' => route('join.employer'), 'tone' => 'plain'],
        ['key' => 'candidate', 'href' => route('join.candidate'), 'tone' => 'outlined'],
        ['key' => 'agent', 'href' => route('join.agent'), 'tone' => 'inverse'],
    ];
@endphp

<div class="site antialiased">
    <x-site.nav active="recruitment" />

    <x-site.hero
        :eyebrow="$t['recruitment.hero.eyebrow'] ?? null"
        :line1="$t['recruitment.hero.line1'] ?? null"
        :line2="$t['recruitment.hero.line2'] ?? null"
        :line3="$t['recruitment.hero.line3'] ?? null"
        :body="$t['recruitment.hero.body'] ?? null"
        :primary="$t['recruitment.hero.cta_primary'] ?? null"
        primary-href="#doors"
        :stats="$stats"
    />

    {{-- ─── The three doors ────────────────────────────────────────── --}}
    <section id="doors" class="site-muted scroll-mt-24 border-b" style="border-color: var(--site-border);">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <x-site.heading
                :eyebrow="$t['recruitment.doors.eyebrow'] ?? null"
                :heading="$t['recruitment.doors.heading'] ?? null"
            />

            <div class="mt-12 grid gap-5 lg:grid-cols-3">
                @foreach ($doors as $door)
                    @php($k = $door['key'])
                    <div @class([
                        'site-card flex flex-col p-8 sm:p-9',
                        'site border' => $door['tone'] === 'plain',
                        'site border-2 border-current' => $door['tone'] === 'outlined',
                        'site-inverse' => $door['tone'] === 'inverse',
                    ]) @if ($door['tone'] === 'plain') style="border-color: var(--site-border);" @endif>
                        <h3 class="display site-subheading">{{ $t["recruitment.doors.{$k}_title"] ?? '' }}</h3>
                        <p class="site-body mt-4 opacity-70">{{ $t["recruitment.doors.{$k}_body"] ?? '' }}</p>

                        <ul @class(['mt-8 flex-1 space-y-4 border-t pt-8', 'border-current/25' => $door['tone'] === 'inverse'])
                            @if ($door['tone'] !== 'inverse') style="border-color: var(--site-border);" @endif>
                            @foreach ($lines($t["recruitment.doors.{$k}_points"] ?? null) as $point)
                                <li class="site-bullet flex gap-3">
                                    <span aria-hidden="true" class="font-bold">&rarr;</span>
                                    <span class="opacity-80">{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ $door['href'] }}" wire:navigate
                           @class([
                               'site-btn group mt-9 inline-flex items-center justify-center gap-3 px-7 py-4 text-sm font-bold transition hover:opacity-85',
                               'site-inverse' => $door['tone'] !== 'inverse',
                           ])
                           @if ($door['tone'] === 'inverse') style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);" @endif>
                            {{ $t["recruitment.doors.{$k}_cta"] ?? '' }}
                            <span aria-hidden="true" class="transition group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── How it works ───────────────────────────────────────────── --}}
    <section>
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <x-site.heading
                :eyebrow="$t['recruitment.steps.eyebrow'] ?? null"
                :heading="$t['recruitment.steps.heading'] ?? null"
                :body="$t['recruitment.steps.body'] ?? null"
            />
            <x-site.steps :items="$steps" />
        </div>
    </section>

    {{-- ─── No hidden fees ─────────────────────────────────────────── --}}
    <section class="site-muted border-y" style="border-color: var(--site-border);">
        <div class="site-shell px-5 py-16 sm:px-8 sm:py-20">
            <div class="grid gap-8 lg:grid-cols-[1fr_1.3fr] lg:gap-16">
                <h2 class="display site-subheading">{{ $t['recruitment.fees.heading'] ?? '' }}</h2>
                <div>
                    <p class="site-bullet opacity-80">{{ $t['recruitment.fees.body'] ?? '' }}</p>
                    <p class="mt-4 text-sm opacity-50">{{ $t['recruitment.fees.note'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    <x-site.cta
        :heading="$t['recruitment.cta.heading'] ?? null"
        :body="$t['recruitment.cta.body'] ?? null"
        :button="$t['recruitment.cta.button'] ?? null"
        href="#doors"
    />

    <x-site.footer />
</div>
