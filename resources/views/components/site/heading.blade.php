@props(['eyebrow' => null, 'heading' => null, 'body' => null])

<div class="grid gap-8 lg:grid-cols-[1.4fr_1fr] lg:gap-16">
    <div>
        @if ($eyebrow)
            <p class="eyebrow opacity-45">{{ $eyebrow }}</p>
        @endif
        <h2 class="display site-heading mt-4">{{ $heading }}</h2>
    </div>

    @if ($body)
        <p class="site-body self-end opacity-65">{{ $body }}</p>
    @endif
</div>
