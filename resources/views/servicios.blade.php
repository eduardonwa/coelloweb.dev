<!-- incluir google script, meta title, meta description-->
<x-site-layout>
    <!-- que haces -->
    <section class="heroe | section container text-center">
        @foreach ($queHaces as $item)
            <article class="flow">
                <h1 class="ff-display">{{ $item['encabezado'] }}</h1>
                @foreach ($item['subtitulo'] as $subtitulo)
                    <p class="padding-4">{!! $subtitulo !!}</p>
                @endforeach
            </article>
        @endforeach
    </section>

    <!-- objeciones -->
    <section
        class="objeciones | section flow">
        @foreach ($objeciones as $item)
            <h1 class="text-center container">
                {{ $item['encabezado'] }}
            </h1>

            <article class="objeciones__copy | container">
                @foreach ($item['subtitulo'] as $subtitulo)
                    <p class="text-center">{!! $subtitulo !!}</p>
                @endforeach
            </article>

            <div
                x-data="{ activeIndex: 0 }"
                class="objecion | container" data-type="wide"
            >
                <!-- contenedor principal -->
                <div class="objecion__wrapper">
                    <!-- columna izquierda -->
                    <div class="content | flow">
                        @foreach ($item['objeciones'] as $index => $obj)
                            <div class="content__item">
                                <button
                                    @click="
                                        if (activeIndex === {{ $index }}) {
                                            lastActiveIndex = activeIndex; // Guarda el último índice antes de cerrar
                                            activeIndex = -1;
                                        } else {
                                            activeIndex = {{ $index }};
                                            lastActiveIndex = {{ $index }};
                                        }
                                    "
                                    class="fs-500"
                                >
                                    {{ $obj['titulo'] }}
                                </button>

                                <div
                                    x-show="activeIndex === {{ $index }}"
                                    x-transition.opacity.scale.100.origin.top.duration.300ms
                                    x-transition.opacity.scale.100.origin.bottom.duration.300ms
                                    class="descripcion"
                                >
                                    @foreach ($obj['descripcion'] as $descripcion)
                                        <p class="fs-500">{!! $descripcion !!}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- columna derecha -->
                    <div class="lottie | mx-auto">
                        @foreach ($item['objeciones'] as $index => $obj)
                            <lottie-player
                                x-show="activeIndex === {{ $index }} || (activeIndex === -1 && lastActiveIndex === {{ $index }})"
                                x-transition
                                src="{{ $obj['media']['lottieFileUrl'] }}"
                                autoplay
                                loop
                                class="lottie-player"
                            ></lottie-player>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <!-- valores -->
    <div class="section">
        <div class="container" data-type="wide">
            @foreach ($valores as $item)
                <h1 class="text-center margin-block-end-12 ff-display fs-700 container" data-type="narrow">
                    {{ $item['titulo'] }}
                </h1>
                <section class="valores">
                    @foreach ($item['definicion'] as $def)
                        <article class="valores__item">
                            <img class="padding-6 mx-auto" src="{{ $def['iconoUrl'] }}" alt="">

                            <h2 class="padding-block-end-6 text-center">
                                {{ $def['encabezado'] }}
                            </h2>

                            @foreach ($def['subtitulo'] as $subtitulo)
                                <p class="text-center fs-500 padding-inline-3">{!! $subtitulo !!}</p>
                            @endforeach
                        </article>
                    @endforeach
                </section>
            @endforeach
        </div>
    </div>

    <!-- ofertas -->
    <div class="section">
        <div class="container" data-type="wide">
            @foreach ($servicios as $item)
                <div class="oferta | even-columns padding-inline-2">
                    <img
                        class="oferta__img"
                        src="{{ $item['imagenUrl'] }}"
                        alt="{{ $item['titulo'] }}"
                    >

                    <div class="oferta__copy">
                        <h1>{{ $item['titulo'] }}</h1>
                        @foreach ($item['descripcion'] as $descripcion)
                            <p>{!! $descripcion !!}</p>
                        @endforeach

                        <a
                            href="{{ $item['enlaceCTA'] }}"
                            class="button"
                            data-type="acerca"
                        >
                            {{ $item['botonCTA']['textoCTA'] }}
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- el proceso -->
    <x-proceso :proceso="$proceso"/>

    <!-- invitacion -->
    <div class="section container" data-type="wide">
        @foreach ($objeciones as $item)
            @foreach ($item['invitacion'] as $inv)
                <div class="invitacion | even-columns padding-inline-2">
                    <h1>{{ $inv['encabezado'] }}</h1>
                    @foreach ($inv['descripcion'] as $descripcion)
                        <p>{!! $descripcion !!}</p>
                    @endforeach
                </div>
            @endforeach
        @endforeach
    </div>

    <!-- testimonios -->
    <div class="section">
        <div class="testimonio-servicios | container even-columns">
            <h1>Testimonios</h1>
            <div class="flex-group">
                @foreach ($testimonios as $item)
                    <div class="testimonio-servicios__testimonio">
                        <p class="fs-500">{!! $item['testimonio'] !!}</p>
                        <span class="fs-400 italic">- {{ $item['nombreEmpresa'] }}</span>,
                        <span class="fs-400 italic">{{ $item['representanteNombre'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- seccion CTA -->
    <section class="seccionCTA | section" data-type="servicios">
        <article class="text-center">
            <div class="container" data-type="narrow">
                <x-seccionCTA
                    :cta="$serviciosCTA"
                    tipoBoton="primary"
                />
            </div>
        </article>
    </section>
</x-site-layout>
