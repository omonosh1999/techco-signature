@php
    $t = \App\Models\SiteContent::allValues();
    $tel = str_replace(' ', '', $t['global.contact.phone'] ?? '');
@endphp

<footer class="site-inverse border-t border-current/20">
    <div class="site-shell px-5 py-14 sm:px-8">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div class="lg:col-span-2">
                <p class="display text-2xl">{{ $t['global.brand.name'] ?? '' }}</p>
                <p class="mt-2 text-sm opacity-55">{{ $t['global.brand.tagline'] ?? '' }}</p>
                <p class="mt-6 max-w-sm text-sm leading-relaxed opacity-45">{{ $t['global.footer.note'] ?? '' }}</p>
            </div>

            <div>
                <p class="eyebrow opacity-45">Explore</p>
                <ul class="mt-4 space-y-2.5 text-sm opacity-75">
                    <li><a href="{{ route('home') }}" wire:navigate class="transition hover:underline">{{ $t['global.nav.home'] ?? '' }}</a></li>
                    <li><a href="{{ route('recruitment') }}" wire:navigate class="transition hover:underline">{{ $t['global.nav.recruitment'] ?? '' }}</a></li>
                    <li><a href="{{ route('school') }}" wire:navigate class="transition hover:underline">{{ $t['global.nav.school'] ?? '' }}</a></li>
                    <li><a href="{{ route('login') }}" wire:navigate class="transition hover:underline">{{ $t['global.nav.login'] ?? '' }}</a></li>
                </ul>
            </div>

            <div>
                <p class="eyebrow opacity-45">Contact</p>
                <ul class="mt-4 space-y-2.5 text-sm opacity-75">
                    <li><a href="mailto:{{ $t['global.contact.email'] ?? '' }}" class="transition hover:underline">{{ $t['global.contact.email'] ?? '' }}</a></li>
                    <li><a href="tel:{{ $tel }}" class="transition hover:underline">{{ $t['global.contact.phone'] ?? '' }}</a></li>
                    <li>{{ $t['global.contact.address'] ?? '' }}</li>
                    <li>{{ $t['global.contact.hours'] ?? '' }}</li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-2 border-t border-current/20 pt-6 text-sm opacity-45 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} {{ $t['global.brand.name'] ?? '' }}. All rights reserved.</p>
            <p>{{ $t['global.contact.rc'] ?? '' }} &nbsp;·&nbsp; {{ $t['global.contact.tin'] ?? '' }}</p>
        </div>
    </div>
</footer>
