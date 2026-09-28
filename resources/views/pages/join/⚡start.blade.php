<?php

use App\Models\SiteContent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts.public')] #[Title('Register')] class extends Component
{
    /**
     * Where each registration path takes its wording from, so the copy on this
     * page always matches the card the person clicked.
     */
    private const SOURCES = [
        'candidate' => 'recruitment.doors.candidate',
        'agent' => 'recruitment.doors.agent',
        'employer' => 'recruitment.doors.employer',
        'student' => 'school.join',
    ];

    #[Locked]
    public string $path = 'candidate';

    public function mount(string $path = 'candidate'): void
    {
        abort_unless(array_key_exists($path, self::SOURCES), 404);

        $this->path = $path;
    }

    public function with(): array
    {
        $t = SiteContent::allValues();
        $prefix = self::SOURCES[$this->path];

        return [
            't' => $t,
            'title' => $t["{$prefix}_title"] ?? $t["{$prefix}.title"] ?? 'Register',
            'body' => $t["{$prefix}_body"] ?? $t["{$prefix}.body"] ?? '',
            'points' => collect(preg_split('/\r\n|\r|\n/', (string) ($t["{$prefix}_points"] ?? $t["{$prefix}.points"] ?? '')))
                ->map(fn ($line) => trim($line))
                ->filter()
                ->values(),
            'back' => $this->path === 'student' ? route('school') : route('recruitment'),
        ];
    }
}; ?>

<div class="site-inverse min-h-screen antialiased">
    <header class="border-b border-current/20">
        <nav class="site-shell flex items-center justify-between px-5 py-4 sm:px-8">
            <a href="{{ route('home') }}" wire:navigate class="display text-xl sm:text-2xl">
                {{ $t['global.brand.name'] ?? 'TechCo Signature' }}
            </a>
            <a href="{{ $back }}" wire:navigate class="text-sm font-semibold opacity-65 transition hover:opacity-100">
                &larr; Back
            </a>
        </nav>
    </header>

    <main class="site-shell px-5 py-16 sm:px-8 sm:py-24">
        <p class="eyebrow opacity-45">Step 1 of 3 &nbsp;·&nbsp; Registration</p>

        <h1 class="display site-heading mt-5">{{ $title }}</h1>

        <p class="site-body mt-6 max-w-xl opacity-70">{{ $body }}</p>

        @if ($points->isNotEmpty())
            <ul class="mt-9 max-w-xl space-y-4 border-t border-current/20 pt-8">
                @foreach ($points as $point)
                    <li class="site-bullet flex gap-3">
                        <span aria-hidden="true" class="font-bold">&rarr;</span>
                        <span class="opacity-80">{{ $point }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="site-card mt-12 border border-current/25 p-8 sm:p-10" style="background: color-mix(in srgb, currentColor 6%, transparent);">
            <p class="display text-xl sm:text-2xl">Registration form</p>
            <p class="site-body mt-3 max-w-lg opacity-65">
                The three-step form — your email, the code we send you, then your details — is being built next.
                Nothing here is live yet.
            </p>
            <a href="{{ $back }}" wire:navigate
               class="site-btn mt-7 inline-flex items-center gap-3 px-7 py-3.5 text-sm font-bold transition hover:opacity-85"
               style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                Go back
            </a>
        </div>
    </main>
</div>
