<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/eduardocoello/ghost.css">
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
            <p>Desarrollo web para equipos comprometidos: materializa la visión de tus clientes y eleva su presencia online.</p>
            <button>Empezar proyecto</button>
        </article>

        <article class="ghost-hero-img-wrap">
            <img class="ghost-hero-mobile-img" src="/images/ghost/iphone-mockup-space-caps.png" alt="">
            <img class="ghost-hero-desktop-img" src="/images/ghost/ghost-hero-desktop-img.png" alt="">
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
