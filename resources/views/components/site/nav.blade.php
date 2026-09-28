@props(['active' => 'home'])

@php
    $t = \App\Models\SiteContent::allValues();

    $links = [
        'home' => ['label' => $t['global.nav.home'] ?? 'Agency', 'href' => route('home')],
        'recruitment' => ['label' => $t['global.nav.recruitment'] ?? 'Recruitment', 'href' => route('recruitment')],
        'school' => ['label' => $t['global.nav.school'] ?? 'Branding School', 'href' => route('school')],
    ];
@endphp

<header class="site-inverse sticky top-0 z-50">
    <nav class="site-shell flex items-center justify-between gap-6 px-5 py-4 sm:px-8">
        <a href="{{ route('home') }}" wire:navigate class="display text-xl sm:text-2xl">
            {{ $t['global.brand.name'] ?? 'TechCo Signature' }}
        </a>

        <div class="hidden items-center gap-8 text-sm font-semibold md:flex">
            @foreach ($links as $key => $link)
                <a href="{{ $link['href'] }}" wire:navigate
                   class="transition {{ $active === $key ? 'opacity-100 underline underline-offset-8' : 'opacity-65 hover:opacity-100' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('login') }}" wire:navigate
               class="site-btn hidden px-4 py-2 text-sm font-semibold opacity-75 transition hover:opacity-100 sm:block">
                {{ $t['global.nav.login'] ?? 'Log in' }}
            </a>
            <a href="{{ route('recruitment') }}#doors" wire:navigate
               class="site-btn px-5 py-2.5 text-sm font-bold transition hover:opacity-85"
               style="background: var(--site-inverse-fg); color: var(--site-inverse-bg);">
                {{ $t['global.nav.signup'] ?? 'Get started' }}
            </a>
        </div>
    </nav>

    {{-- Small screens: the three arms stay reachable without a menu to open. --}}
    <div class="site-shell flex gap-6 border-t border-current/15 px-5 py-2.5 text-sm font-semibold md:hidden">
        @foreach ($links as $key => $link)
            <a href="{{ $link['href'] }}" wire:navigate
               class="transition {{ $active === $key ? 'opacity-100 underline underline-offset-4' : 'opacity-60' }}">
                {{ $link['label'] }}
            </a>
        @endforeach
    </div>
</header>
