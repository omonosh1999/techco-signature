<?php

use App\Models\SiteContent;
use App\Models\SiteItem;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts.public')] #[Title('TechCo Branding School')] class extends Component
{
    public function with(): array
    {
        return [
            't' => SiteContent::allValues(),
            ...SiteItem::forPage('school', ['stats', 'streams', 'how']),
        ];
    }
}; ?>

<div class="site antialiased">
    <x-site.nav active="school" />

    <x-site.hero
        :eyebrow="$t['school.hero.eyebrow'] ?? null"
        :line1="$t['school.hero.line1'] ?? null"
        :line2="$t['school.hero.line2'] ?? null"
        :line3="$t['school.hero.line3'] ?? null"
        :body="$t['school.hero.body'] ?? null"
        :primary="$t['school.hero.cta_primary'] ?? null"
        :primary-href="route('join.student')"
        :secondary="$t['school.hero.cta_secondary'] ?? null"
        secondary-href="#subjects"
        :stats="$stats"
    />

    {{-- ─── Subjects ───────────────────────────────────────────────── --}}
    <section id="subjects" class="scroll-mt-24">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <x-site.heading
                :eyebrow="$t['school.streams.eyebrow'] ?? null"
                :heading="$t['school.streams.heading'] ?? null"
                :body="$t['school.streams.body'] ?? null"
            />

            <div class="mt-14 grid gap-5 sm:grid-cols-2">
                @foreach ($streams as $stream)
                    <div class="site-card border p-7 transition hover:border-current sm:p-9"
                         style="border-color: var(--site-border);">
                        <h3 class="display text-2xl sm:text-3xl">{{ $stream['title'] ?? '' }}</h3>
                        <p class="site-body mt-3 opacity-65">{{ $stream['body'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── How it works ───────────────────────────────────────────── --}}
    <section class="site-muted border-t" style="border-color: var(--site-border);">
        <div class="site-shell px-5 py-20 sm:px-8 sm:py-28">
            <x-site.heading
                :eyebrow="$t['school.how.eyebrow'] ?? null"
                :heading="$t['school.how.heading'] ?? null"
                :body="$t['school.how.body'] ?? null"
            />
            <x-site.steps :items="$how" />
        </div>
    </section>

    {{-- ─── Pay by the month ───────────────────────────────────────── --}}
    <section class="border-b" style="border-color: var(--site-border);">
        <div class="site-shell px-5 py-16 sm:px-8 sm:py-20">
            <div class="grid gap-8 lg:grid-cols-[1fr_1.3fr] lg:gap-16">
                <h2 class="display site-subheading">{{ $t['school.fees.heading'] ?? '' }}</h2>
                <div>
                    <p class="site-bullet opacity-80">{{ $t['school.fees.body'] ?? '' }}</p>
                    <p class="mt-4 text-sm opacity-50">{{ $t['school.fees.note'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    <x-site.cta
        :heading="$t['school.cta.heading'] ?? null"
        :body="$t['school.cta.body'] ?? null"
        :button="$t['school.cta.button'] ?? null"
        :href="route('join.student')"
    />

    <x-site.footer />
</div>
