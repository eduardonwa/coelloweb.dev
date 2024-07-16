<!DOCTYPE html>
<html x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ $metaDescription }}">
        <meta name="msvalidate.01" content="64EB583AF6E921E1270E6F29A784A037" />
        <meta name="google-adsense-account" content="ca-pub-5338710529457277">
        <title>{{ $metaTitle ?? 'Eduardo Coello' }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="/css/eduardocoello/styles.css">
        <style>
            /* tip-tap styles */
            a[data-as-button="false"] {
                color: var(--accent-500);

                -webkit-transition: color 200ms linear;
                -ms-transition: color 200ms linear;
                transition: color 200ms linear;
            }

            a[data-as-button="false"]:hover {
                color: var(--accent-600);
                text-decoration: underline;
            }

            small {
                font-size: 60% !important;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
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

        <x-bottom-nav>
            <x-slot name="content">
                <a class="font-semibold flex flex-col items-center justify-center"
                    href="{{ route('categories.index') }}">
                    <svg viewBox="0 0 512 512" width="24" height="24">
                        <g id="_26-Diagram" transform="translate(0 -5120)">
                            <g id="g2181" transform="translate(72.912 5160.82)">
                                <path class="fill-white" d="m0 85.82c-23.662 0-42.912-19.249-42.912-42.91s19.25-42.91 42.912-42.91 42.912 19.249 42.912 42.91-19.25 42.91-42.912 42.91m0-115.82c-40.204 0-72.912 32.707-72.912 72.91s32.708 72.91 72.912 72.91 72.912-32.707 72.912-72.91c0-40.203-32.708-72.91-72.912-72.91" fill-rule="nonzero"/>
                            </g>
                            <g id="g2185" transform="translate(72.912 5333.09)">
                                <path class="fill-white" d="m0 85.83c-23.662 0-42.912-19.254-42.912-42.92 0-23.661 19.25-42.91 42.912-42.91s42.912 19.249 42.912 42.91c0 23.666-19.25 42.92-42.912 42.92m0-115.83c-40.204 0-72.912 32.707-72.912 72.91 0 40.208 32.708 72.92 72.912 72.92s72.912-32.712 72.912-72.92c0-40.203-32.708-72.91-72.912-72.91" fill-rule="nonzero"/>
                            </g>
                            <g id="g2189" transform="translate(72.912 5505.37)">
                                <path class="fill-white" d="m0 85.82c-23.662 0-42.912-19.249-42.912-42.91s19.25-42.91 42.912-42.91 42.912 19.249 42.912 42.91-19.25 42.91-42.912 42.91m0-115.82c-40.204 0-72.912 32.707-72.912 72.91s32.708 72.91 72.912 72.91 72.912-32.707 72.912-72.91c0-40.203-32.708-72.91-72.912-72.91" fill-rule="nonzero"/>
                            </g>
                            <g id="g2193" transform="translate(217.158 5226.14)">
                                <path class="fill-white" d="m0-44.829c5.986-5.987 13.946-9.285 22.413-9.285h210.731c8.467 0 16.426 3.298 22.412 9.285 5.988 5.989 9.286 13.949 9.286 22.414 0 8.472-3.296 16.431-9.286 22.415-5.986 5.987-13.945 9.285-22.412 9.285h-210.731c-8.467 0-16.427-3.298-22.419-9.291-5.984-5.978-9.279-13.937-9.279-22.409 0-8.465 3.298-16.425 9.285-22.414m22.413 84.114h210.731c16.481 0 31.976-6.419 43.622-18.068 11.656-11.646 18.076-27.142 18.076-43.632 0-16.477-6.418-31.97-18.07-43.625s-27.147-18.074-43.628-18.074h-210.731c-16.481 0-31.976 6.419-43.629 18.074-11.652 11.655-18.069 27.148-18.069 43.625 0 16.49 6.419 31.985 18.069 43.626 11.653 11.655 27.148 18.074 43.629 18.074" fill-rule="nonzero"/>
                            </g>
                            <g id="g2197" transform="translate(482 5375.99)">
                                <path class="fill-white" d="m0 .02c0 8.343-3.384 16.513-9.28 22.409-5.99 5.986-13.951 9.281-22.418 9.281h-210.731c-8.467 0-16.428-3.295-22.413-9.275-5.901-5.902-9.285-14.072-9.285-22.425 0-8.465 3.298-16.426 9.285-22.415 5.987-5.987 13.946-9.285 22.413-9.285h210.731c8.467 0 16.427 3.298 22.412 9.284 5.988 5.99 9.286 13.951 9.286 22.416zm-31.698-61.71h-210.731c-16.481 0-31.976 6.419-43.63 18.075-11.651 11.656-18.068 27.15-18.068 43.635 0 16.478 6.417 31.971 18.075 43.632 11.656 11.645 27.148 18.058 43.623 18.058h210.731c16.475 0 31.967-6.413 43.628-18.064 11.653-11.655 18.07-27.148 18.07-43.626v-.01c0-16.476-6.417-31.969-18.07-43.626-11.652-11.655-27.146-18.074-43.628-18.074" fill-rule="nonzero"/>
                            </g>
                            <g id="g2201" transform="translate(472.714 5525.86)">
                                <path class="fill-white" d="m0 44.829c-5.986 5.987-13.945 9.285-22.412 9.285h-210.731c-8.467 0-16.427-3.298-22.413-9.285-5.987-5.989-9.285-13.949-9.285-22.414 0-8.472 3.295-16.431 9.285-22.415 5.986-5.987 13.946-9.285 22.413-9.285h210.731c8.467 0 16.426 3.298 22.418 9.291 5.984 5.978 9.28 13.937 9.28 22.409 0 8.465-3.298 16.425-9.286 22.414m-22.412-84.114h-210.731c-16.482 0-31.976 6.419-43.623 18.068-11.656 11.647-18.075 27.142-18.075 43.632 0 16.477 6.417 31.97 18.069 43.625 11.653 11.655 27.147 18.074 43.629 18.074h210.731c16.481 0 31.975-6.419 43.628-18.074 11.652-11.655 18.07-27.148 18.07-43.625 0-16.49-6.42-31.986-18.07-43.626-11.653-11.655-27.147-18.074-43.628-18.074" fill-rule="nonzero"/>
                            </g>
                        </g>
                    </svg>
                    Categorías
                </a>
                <a href="{{ route('welcome') }}" class="w-12 fill-current">
                    <x-logo-app-small/>
                </a>
                <a class="font-semibold flex flex-col items-center justify-center"
                    href="{{ route('about') }}">
                    <svg viewBox="0 0 24 24" width="34" height="30" xmlns="http://www.w3.org/2000/svg" data-name="Layer 3">
                        <path class="fill-white" d="m12 21.75c-.49 0-.96-.23-1.27-.64l-2.1-2.73c-.2-.26-.48-.41-.76-.41h-2.19c-1.91 0-3.46-1.73-3.46-3.85v-8.02c0-2.12 1.55-3.85 3.46-3.85h12.64c1.91 0 3.46 1.73 3.46 3.85v8.02c0 2.12-1.55 3.85-3.46 3.85h-2.19c-.28 0-.56.15-.76.41l-2.1 2.73c-.31.41-.78.64-1.27.64zm-6.32-18c-1.08 0-1.96 1.05-1.96 2.35v8.02c0 1.29.88 2.35 1.96 2.35h2.19c.75 0 1.46.36 1.95.99l2.1 2.73c.06.07.11.07.17 0l2.1-2.73c.49-.63 1.2-.99 1.95-.99h2.19c1.08 0 1.96-1.05 1.96-2.35v-8.02c0-1.29-.88-2.35-1.96-2.35z"/>
                        <path class="fill-white" d="m12 6.5c.35 0 .64.29.64.64s-.29.64-.64.64-.64-.29-.64-.64.29-.64.64-.64m0-1.5c-1.18 0-2.14.96-2.14 2.14s.96 2.14 2.14 2.14 2.14-.96 2.14-2.14-.96-2.14-2.14-2.14z"/>
                        <path class="fill-white" d="m12 11.5c1.81 0 2.75.77 2.79 1-.04.23-.97 1-2.79 1s-2.75-.77-2.79-1c.04-.23.97-1 2.79-1m0-1.5c-2.37 0-4.29 1.12-4.29 2.5s1.92 2.5 4.29 2.5 4.29-1.12 4.29-2.5-1.92-2.5-4.29-2.5z"/>
                    </svg>
                    Acerca
                </a>
            </x-slot>
        </x-bottom-nav>

        <!-- navbar -->
        <x-navbar>
        </x-navbar>

        <main class="content-grid">
            {{ $slot }}
            <!-- conecta conmigo -->
            <x-conecta>
            </x-conecta>

            <!-- footer -->
            <x-footer>
            </x-footer>
        </main>

        @livewireScriptConfig
    </body>
</html>
