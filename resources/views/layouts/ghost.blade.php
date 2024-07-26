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
    <style>
        .ghost-navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
    </style>
    @livewireStyles
</head>
<body>
    <section class="ghost-hero-wrap full-width">
        <article class="ghost-copy">
            <h1>¿Que pasaría si pudieras desarrollar sitios web sin escribir una sola línea de código?</h1>
            <p>Esta es la gran revelación que toda agencia necesita conocer para aumentar su roster de clientes.</p>
            <button class="glow-effect">
                Empezar proyecto
                <svg class="glow-container">
                    <rect pathLength="100" stroke-linecap="round" class="glow-blur"></rect>
                    <rect pathLength="100" stroke-linecap="round" class="glow-line"></rect>
                </svg>
            </button>
        </article>

        <article class="ghost-hero-img-wrap">
            <img class="ghost-hero-mobile-img" src="/images/ghost/spacecaps-iphone.webp" alt="">
            <img class="ghost-hero-desktop-img" src="/images/ghost/spacecaps-desktop.webp" alt="">
        </article>
    </section>

    <div class="ghost-navbar">
        <x-navbar>
        </x-navbar>
    </div>

    {{-- @livewire('contact-form') --}}

    <main class="content-grid">
        {{ $slot }}

        <x-footer>
        </x-footer>
    </main>
    @livewireScriptConfig
</body>
</html>
