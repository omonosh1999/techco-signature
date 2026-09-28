@props(['items'])

<div class="mt-14 border-t" style="border-color: var(--site-border);">
    @foreach ($items as $step)
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
