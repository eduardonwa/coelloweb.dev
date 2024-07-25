<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/eduardocoello/ghost.css">
    <script src="js/eduardocoello/main.js" defer></script>
    <title>Ghost Designer</title>
    <style>
        .ghost-navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <section class="ghost-hero-wrap full-width">
        <article class="ghost-copy">
            <h1>Tu diseñador fantasma</h1>
            <p>Desarrollo web para equipos comprometidos, y sigan materializando la visión de sus clientes, <em> rápido</em>.</p>
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

    <main class="content-grid">
        {{ $slot }}

        <x-footer>
        </x-footer>
    </main>
</body>
</html>
