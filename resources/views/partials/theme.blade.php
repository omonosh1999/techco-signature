@php
    use App\Models\Setting;

    // Every public-site design token lives in the settings table, so an admin
    // can restyle the page without a deploy.
    $tokens = [
        '--site-bg' => Setting::get('theme.bg', '#ffffff'),
        '--site-fg' => Setting::get('theme.fg', '#000000'),
        '--site-inverse-bg' => Setting::get('theme.inverse_bg', '#000000'),
        '--site-inverse-fg' => Setting::get('theme.inverse_fg', '#ffffff'),
        '--site-muted-bg' => Setting::get('theme.muted_bg', '#f4f4f2'),
        '--site-border' => Setting::get('theme.border', '#e3e3e0'),
        '--site-accent' => Setting::get('theme.accent', '#000000'),
        '--site-display-min' => Setting::get('theme.display_min', '2.75rem'),
        '--site-display-max' => Setting::get('theme.display_max', '10rem'),
        '--site-heading-max' => Setting::get('theme.section_heading_max', '4.5rem'),
        '--site-body' => Setting::get('theme.body_size', '1.0625rem'),
        '--site-bullet' => Setting::get('theme.bullet_size', '1.125rem'),
        '--site-eyebrow' => Setting::get('theme.eyebrow_size', '0.8125rem'),
        '--site-radius' => Setting::get('theme.radius', '1.5rem'),
        '--site-max' => Setting::get('theme.max_width', '80rem'),
    ];
@endphp

<style>
    :root {
        @foreach ($tokens as $name => $value)
            {{ $name }}: {{ $value }};
        @endforeach
    }

    .site { background: var(--site-bg); color: var(--site-fg); }
    .site-inverse { background: var(--site-inverse-bg); color: var(--site-inverse-fg); }
    .site-muted { background: var(--site-muted-bg); }
    .site-shell { max-width: var(--site-max); margin-inline: auto; }

    .site-display { font-size: clamp(var(--site-display-min), 12vw, var(--site-display-max)); }
    .site-heading { font-size: clamp(2rem, 6vw, var(--site-heading-max)); }
    .site-subheading { font-size: clamp(1.6rem, 3.5vw, calc(var(--site-heading-max) * 0.56)); }
    .site-body { font-size: var(--site-body); line-height: 1.65; }
    .site-bullet { font-size: var(--site-bullet); line-height: 1.55; }
    .eyebrow { font-size: var(--site-eyebrow); }

    .site-card { border-radius: var(--site-radius); }
    .site-btn { border-radius: 9999px; }
</style>
