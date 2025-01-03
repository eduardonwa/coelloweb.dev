<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $metaDescription ?? 'Diseño web enfocado en las personas. Para que tu sitio web te encante a ti, y a los tuyos.' }}">
    <!-- open graph -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Eduardo Coello | Diseño Web">
    <meta property="og:description" content="{{ $metaDescription ?? 'Diseño web enfocado en las personas. Para que tu sitio web te encante a ti, y a los tuyos.'}}">
    <meta property="og:locale" content="es_MX">
    <meta property="og:site_name" content="Eduardo Coello | Diseño Web">
    <meta property="og:image" content="{{ asset('images/ecoello-logo.png') }}">
    <meta property="og:image:width" content="358">
    <meta property="og:image:height" content="252">
    <meta property="og:type" content="website">
    <!-- preload de fuentes -->
    <link rel="preload" href="/fonts/chaney-ultraextended.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/chaney-wide.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/chaney-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/nudica-medium.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/nudica-regular.woff2" as="font" type="font/woff2" crossorigin>
    <!-- titulo -->
    <title>{{ $metaTitle ?? 'Eduardo Coello - Diseña tu web' }}</title>
    <!-- recursos vite -->
    @vite(['resources/js/app.js', 'resources/js/animaciones.js'])
    @livewireStyles
    <!-- scripts externos -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.6.1/lazyload.min.js" defer></script>
    <style>
        .faded-bg {
            background-color: #EDFFFE;
        }
    </style>
</head>
    <body style="background: linear-gradient(to bottom, transparent 20%, #edfffe)">
        <x-navbar/>

        <div class="faded-bg">
            <main>
                {{ $slot }}
            </main>
            <x-footer/>
        </div>

        @livewireScripts
        <script src="/js/eduardocoello/site.js"></script>
    </body>
</html>
