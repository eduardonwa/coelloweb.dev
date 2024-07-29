<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Soy un subcontratista especializado en diseño web moderno y profesional. Ayudo a equipos y agencias comprometidos con otros proyectos a crear sitios web de alta calidad.">
    <meta name="author" content="Eduardo Coello">
    <link rel="stylesheet" href="css/eduardocoello/ghost.css">
    <script src="js/eduardocoello/main.js" defer></script>
    <title>Diseñador Fantasma - Diseño Web Moderno y Profesional</title>
    @livewireStyles
</head>
<body>
    <dialog id="solicitudDialogo">
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
