<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <!-- Open Graph meta tags -->
        <meta property="og:title" content="{{ $metaTitle }}">
        <meta property="og:description" content="{{ $metaDescription }}">
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset($metaThumbnail) }}">
        <meta property="og:image:secure_url" content="{{ asset($metaThumbnail) }}">
        <meta property="og:image:type" content="image/webp">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:locale" content="es_ES">
        <meta property="og:site_name" content="Eduardo Coello">
        <meta property="fb:app_id" content="659345982284804">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ $metaDescription }}">
        <meta name="msvalidate.01" content="64EB583AF6E921E1270E6F29A784A037" />
        <meta name="google-adsense-account" content="ca-pub-5338710529457277">
        <title>{{ $metaTitle ?? 'Eduardo Coello | Blog' }}</title>
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        @livewireStyles
        <!-- lazy loading -->
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js"></script>
    </head>

    <body class="antialiased">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-MPL9EF0DLQ"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-MPL9EF0DLQ');
        </script>

        <x-navbar/>

        <main>
            {{ $slot }}
            <!-- conecta conmigo -->
            <x-conecta>
            </x-conecta>

            <!-- footer -->
            <x-footer>
            </x-footer>
        </main>

        @livewireScripts
        <script src="/js/eduardocoello/site.js"></script>
    </body>
</html>
