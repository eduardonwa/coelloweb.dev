<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eduardo Coello - SEO Tags</title>
    @vite(['resources/js/app.js', 'resources/js/animaciones.js'])
    @livewireStyles
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.6.1/lazyload.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body style="background: linear-gradient(to bottom, transparent 20%, #edfffe)">
    <x-navbar/>

    <div style="background-color: #EDFFFE">
        <main>
            {{ $slot }}
        </main>
        <x-footer/>
    </div>

    @livewireScripts
    <script src="/js/eduardocoello/site.js"></script>
</body>
</html>
