<!DOCTYPE html>
<html lang="es-ES">
<head>
    <!-- open graph -->
    <meta property="og:title" content="Hablemos de tus ideas" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/ecoello-logo.png') }}" />
    <meta property="og:description" content="Soy un subcontratista especializado en diseño web moderno y profesional. Ayudo a equipos y agencias comprometidos con otros proyectos a crear sitios web de alta calidad." />
    <meta property="og:site_name" content="CoelloWeb" />
    <meta property="og:locale" content="es_ES" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Soy un subcontratista especializado en diseño web moderno y profesional. Ayudo a equipos y agencias comprometidos con otros proyectos a crear sitios web de alta calidad.">
    <meta name="author" content="Eduardo Coello">
    <link rel="stylesheet" href="css/eduardocoello/ghost.css">
    <script src="js/eduardocoello/ghost.js" defer></script>
    <title>Diseñador Fantasma - Diseño Web Moderno y Profesional</title>
    @livewireStyles
</head>
<body>

    <dialog class="modal" id="solicitudDialogo">
        <form method="dialog">
            <button type="submit" id="closeButton">&rsaquo;&lsaquo;</button>
        </form>
        @livewire('contact-form')
    </dialog>

    <main class="content-grid">
        {{ $slot }}

        <x-footer>
        </x-footer>
    </main>
    @livewireScripts
</body>
</html>
