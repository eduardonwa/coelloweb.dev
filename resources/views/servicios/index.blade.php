<!-- incluir google script, meta title, meta description-->
<x-site-layout :metaTitle="'Eduardo Coello | Servicios'">
    <!-- que haces -->
    <section class="heroe | bg-seccion section text-center">
        @foreach ($queHaces as $item)
            <article class="flow container">
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
                    <h2 class="text-center">{!! $subtitulo !!}</h2>
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
                                    :class="{ 'active': activeIndex === {{ $index }} }"
                                >
                                    <img
                                        x-show="activeIndex !== {{ $index }}"
                                        x-transition.opacity
                                        src="{{ asset('/images/chevron-right.svg') }}"
                                        alt="Chevron Right"
                                        class="icon"
                                    >
                                    <img
                                        class="chevron-down"
                                        x-show="activeIndex === {{ $index }}"
                                        x-transition.opacity
                                        src="{{ asset('/images/chevron-down.svg') }}"
                                        alt="Chevron Down"
                                        class="icon"
                                    >
                                    {{ $obj['titulo'] }}
                                </button>

                                <div
                                    x-show="activeIndex === {{ $index }}"
                                    x-transition.duration.300ms
                                    class="descripcion"
                                >
                                    @foreach ($obj['descripcion'] as $descripcion)
                                        <p class="fs-600">{!! $descripcion !!}</p>
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
                <section class="valores" >
                    @foreach ($item['definicion'] as $def)
                        <article class="valores__item">
                            <img class="padding-6 mx-auto" src="{{ $def['iconoUrl'] }}">

                            <h2 class="padding-block-end-6 text-center">
                                {{ $def['encabezado'] }}
                            </h2>

                            @foreach ($def['subtitulo'] as $subtitulo)
                                <p class="text-center fs-600 padding-inline-4">{!! $subtitulo !!}</p>
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
                            href="{{ url('servicios/' . $item['enlaceCTA']) }}"
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

    <img src="/images/listo-para-top-bg.svg">
    <!-- invitacion -->
    <div class="margin-block-8 container" data-type="wide">
        @foreach ($objeciones as $item)
            @foreach ($item['invitacion'] as $inv)
                <section class="invitacion | even-columns padding-inline-2">
                    <h1>{{ $inv['encabezado'] }}</h1>
                    <div>
                        @foreach ($inv['descripcion'] as $descripcion)
                            <p>{!! $descripcion !!}</p>
                        @endforeach
                        <a href="{{ url($inv['botonCTA']['enlaceCTA']) }}" class="button" data-type="contacto">
                            {{ $inv['botonCTA']['textoCTA'] }}
                        </a>
                    </div>
                </section>
            @endforeach
        @endforeach
    </div>
    <img src="/images/listo-para-bot-bg.svg">

    <!-- el proceso -->
    <x-proceso :proceso="$proceso"/>

    <!-- testimonios -->
    <div class="section">
        <div class="testimonio-servicios | text-center container">
            <h1>Testimonios</h1>
            <div
                x-data="{
                    activeIndex: 0,
                    total: {{ count($testimonios) }},
                    next() {
                        this.activeIndex = (this.activeIndex + 1) % this.total;
                        this.scrollToCurrent();
                    },
                    prev() {
                        this.activeIndex = (this.activeIndex - 1 + this.total) % this.total;
                        this.scrollToCurrent();
                    },
                    scrollToCurrent() {
                        const slider = this.$refs.slider;
                        slider.scrollTo({
                            left: this.activeIndex * slider.offsetWidth,
                            behavior: 'smooth',
                        });
                    }
                }"
                class="testimonio-servicios__carusel-container"
            >

                <div
                    x-ref="slider"
                    class="testimonio-servicios__testimonio"
                >
                    @foreach ($testimonios as $index => $item)
                        <div class="testimonio-servicios__testimonio__inner | flow">
                            <div class="testimonio-servicios__testimonio__inner__logo">
                                <img class="" src="{{ $item['logoUrl'] }}" alt="">
                            </div>
                            <p class="fs-600">{!! $item['testimonio'] !!}</p>
                            <span class="fs-600 italic">{{ $item['nombreEmpresa'] }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="testimonio-servicios__carusel-container__nav-btns">
                    <button class="carusel-btn prev" aria-label="previous" @click="prev">
                        <img src="images/chevron-left.svg" aria-hidden="true"/>
                    </button>
                    <button class="carusel-btn next" aria-label="next" @click="next">
                        <img src="images/chevron-right.svg" aria-hidden="true"/>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- seccion CTA -->
    <section class="seccion-cta | text-center section" data-type="servicios">
        <img class="seccion-cta__bg" src="/images/cta-bg.svg" loading="lazy" alt="">
        <div class="seccion-cta__content | container" data-type="narrow">
            <x-seccionCTA
                :cta="$serviciosCTA"
                tipoBoton="primary"
            />
        </div>
    </section>
</x-site-layout>
