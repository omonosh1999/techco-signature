<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        @include('partials.head')
        @include('partials.theme')
    </head>
    <body class="site min-h-screen">
        {{ $slot }}
        @fluxScripts
    </body>
</html>
