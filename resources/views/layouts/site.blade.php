<!DOCTYPE html>
<html lang="es-ES">
<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WXV2W4JS');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '673850992275770');
        fbq('track', 'PageView');
    </script>

    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=673850992275770&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Meta Pixel Code -->
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
    <link href="/fonts/chaney-ultraextended.woff2" as="font" type="font/woff2" crossorigin>
    <link href="/fonts/chaney-wide.woff2" as="font" type="font/woff2" crossorigin>
    <link href="/fonts/chaney-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link href="/fonts/nudica-medium.woff2" as="font" type="font/woff2" crossorigin>
    <link href="/fonts/nudica-regular.woff2" as="font" type="font/woff2" crossorigin>
    <!-- titulo -->
    <title>{{ $metaTitle ?? 'Eduardo Coello - Diseña tu web' }}</title>
    <!-- recursos vite -->
    @vite(['resources/js/app.js'])
    @livewireStyles
    <!-- scripts externos -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@1.5.7/dist/lottie-player.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.6.1/lazyload.min.js"></script>
  
    <style>
        .faded-bg {
            background-color: #EDFFFE;
        }
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11198361905">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-11198361905');
    </script>
</head>
    <body id="content" style="opacity: 0; transition: opacity 0.3s ease;" style="background: linear-gradient(to bottom, transparent 20%, #edfffe)">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WXV2W4JS"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        
        <div class="main-layout">
            <x-navbar/>
    
            <div class="faded-bg">
                <main>
                    {{ $slot }}
                </main>
                <x-footer/>
            </div>
        </div>

        @stack('scripts')

        <script src="/js/eduardocoello/site.js"></script>
        <script>
            window.addEventListener('load', () => {
                // Cambia el fondo
                document.body.style.background = 'linear-gradient(to bottom, transparent 20%, #edfffe)';

                // Muestra el contenido
                document.getElementById('content').style.opacity = 1;
            });
        </script>
        @livewireScripts
    </body>
</html>
