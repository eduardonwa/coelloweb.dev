<!DOCTYPE html>
<html lang="es-ES">
<head>
    <!-- open graph -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:locale" content="es_ES">
    <meta property="og:site_name" content="Eduardo Coello | Diseño Web">
    <meta property="og:image:secure_url" content="{{ asset('images/eduardocoello-foto.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="320">
    <meta property="og:image:height" content="301">
    <meta charset="UTF-8">
    <meta name="image" property="og:image" content="{{ asset('images/eduardocoello-foto.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $metaTitle ?? 'Eduardo Coello - Diseña tu web' }}</title>
    @vite(['resources/js/app.js', 'resources/js/animaciones.js'])
    @livewireStyles
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.6.1/lazyload.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
