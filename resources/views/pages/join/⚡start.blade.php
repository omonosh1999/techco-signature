<?php

use App\Models\SiteContent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts.public')] #[Title('Register')] class extends Component
{
    #[Locked]
    public string $path = 'candidate';

    public function mount(string $path = 'candidate'): void
    {
        abort_unless(in_array($path, ['candidate', 'agent'], true), 404);

        $this->path = $path;
    }

    public function with(): array
    {
        $t = SiteContent::allValues();

        return [
            't' => $t,
            'title' => $t["paths.{$this->path}_title"] ?? 'Register',
            'body' => $t["paths.{$this->path}_body"] ?? '',
            'points' => collect(preg_split('/\r\n|\r|\n/', (string) ($t["paths.{$this->path}_points"] ?? '')))
                ->map(fn ($line) => trim($line))
                ->filter()
                ->values(),
        ];
    }
}; ?>

<div class="min-h-screen bg-black text-white antialiased">
    <header class="border-b border-white/15">
        <nav class="mx-auto flex max-w-4xl items-center justify-between px-5 py-4 sm:px-8">
            <a href="{{ route('home') }}" wire:navigate class="display text-xl sm:text-2xl">
                {{ $t['brand.name'] ?? 'TechCo Signature' }}
            </a>
            <a href="{{ route('home') }}" wire:navigate class="text-sm font-semibold text-white/60 transition hover:text-white">
                &larr; Back
            </a>
        </nav>
    </header>

    <main class="mx-auto max-w-4xl px-5 py-16 sm:px-8 sm:py-24">
        <p class="eyebrow text-white/40">Step 1 of 3 &nbsp;·&nbsp; Registration</p>

        <h1 class="display mt-5 text-[clamp(2rem,7vw,4.5rem)]">{{ $title }}</h1>

        <p class="mt-6 max-w-xl text-base leading-relaxed text-white/65">{{ $body }}</p>

        @if ($points->isNotEmpty())
            <ul class="mt-9 max-w-xl space-y-3 border-t border-white/15 pt-8">
                @foreach ($points as $point)
                    <li class="flex gap-3 text-sm sm:text-base">
                        <span aria-hidden="true" class="font-bold">&rarr;</span>
                        <span class="text-white/75">{{ $point }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="mt-12 rounded-3xl border border-white/20 bg-white/5 p-8 sm:p-10">
            <p class="display text-xl sm:text-2xl">Registration form</p>
            <p class="mt-3 max-w-lg text-sm leading-relaxed text-white/60">
                The three-step form — email, verification code, then your details — is being built next.
                Nothing here is live yet.
            </p>
            <a href="{{ route('home') }}" wire:navigate
               class="mt-7 inline-flex items-center gap-3 rounded-full bg-white px-7 py-3.5 text-sm font-bold text-black transition hover:bg-white/85">
                Back to the homepage
            </a>
        </div>
    </main>
</div>
