<x-site-layout metaDescription="Enfocado en las personas, para que tu sitio web te encante a ti y a tus clientes.">
    <!-- seccion de impacto/heroe -->
    @foreach($impacto as $item)
        <section class="hero | bg-seccion hero__top-space">
            <div class="container" data-type="full-bleed">
                <article class="even-columns">
                    <div class="flow">
                        <h1 class="hero__header">
                            {{ $item['encabezado'] }}
                        </h1>

                        @foreach ($item['subtitulo'] as $sub)
                            <h2 class="hero__subtitulo">{!! $sub !!}</h2>
                        @endforeach

                        <a
                            href="{{ $item['enlaceCTA'] }}"
                            class="button"
                            data-type="primary"
                        >
                            {{ $item['botonCTA']['textoCTA'] }}
                        </a>

                        @foreach ($item['testimonioMetrica'] as $testimonio)
                            <p class="hero__testimonio">{!! $testimonio !!}</p>
                        @endforeach
                    </div>

                    <article class="hero__image-wrap">
                        <img
                            class="hero__image-wrap__bg"
                            src="/images/espiral-heroe.svg"
                            alt=""
                        />
                        <img
                            class="hero__image-wrap__impacto lazy"
                            src="{{ $item['lqip'] }}"
                            data-src="{{ $item['imagenUrl'] }}"
                            alt="{{ $item['encabezado'] }}"
                        >
                    </article>
                </article>
            </div>
        </section>
    @endforeach

    <!-- el gran problema -->
    @foreach ($granProblema as $item)
        <section class="gran-problema | padding-block-15 padding-inline-5">
            <img class="gran-problema__bg" src="/images/bg-problema.svg" alt="">
            <div class="gran-problema__content | container even-columns" data-type="wide">
                <header class="gran-problema__content__header">
                    <img
                        class="gran-problema-pic lazy"
                        src="{{ $item['lqip'] }}"
                        data-src="{{ $item['imagenUrl'] }}"
                        alt="{{ $item['encabezado'] }}"
                    >
                    <h1 id="gp-trigger">{{ $item['encabezado'] }}</h1>
                </header>

                <article class="gran-problema__content__copy">
                    <h2>{{ $item['subtitulo'] }}</h2>
                    @foreach($item['descripcion'] as $descripcion)
                        <p>{!! $descripcion !!}</p>
                    @endforeach
                </article>
            </div>
        </section>
    @endforeach

    <!-- porque Eduardo -->
    @foreach ($porqueEduardo as $item)
        <section class="section padding-inline-5">
            <div class="container" data-type="wide">
                <article class="porque-eduardo | even-columns">
                    <img
                        class="pq-eduardo-img lazy"
                        src="{{ $item['imagenUrl'] }}"
                        alt="¿Por que Eduardo Coello?"
                    >

                    <article class="porque-eduardo__copy">
                        @foreach ($item['descripcion'] as $descripcion)
                            <p>{!! $descripcion !!}</p>
                        @endforeach

                        <a
                            href="{{ $item['enlaceCTA'] }}"
                            class="button margin-block-start-8"
                            data-type="acerca"
                        >
                            {{ $item['botonCTA']['textoCTA'] }}
                        </a>
                    </article>
                </article>
            </div>
        </section>
    @endforeach

    <!-- servicios -->
    <div class="container section" data-type="full-bleed">
        <div class="servicio">
            @foreach ($servicios as $item)
                <div class="servicio-item | even-columns">
                    <article class="servicio-item__copy | flow">
                        <!-- titulo -->
                        <h1>{{ $item['titulo'] }}</h1>

                        <!-- descripción -->
                        @foreach ($item['descripcion'] as $descripcion)
                            <p>{!! $descripcion !!}</p>
                        @endforeach

                        <!-- CTA -->
                        <a
                            href="{{ $item['enlaceCTA'] }}"
                            class="button"
                            data-type="info"
                        >
                            {{ $item['botonCTA']['textoCTA'] }}
                            <img src="{{ $item['iconoCTA'] }}" alt="este es un icono para el boton">
                        </a>
                    </article>
                    <!-- imagen -->
                    <article class="servicio-item__imagen">
                        <img
                            loading="lazy"
                            class="servicio-img-anim lazy"
                            src="{{ $item['imagenUrl'] }}"
                            alt="{{ $item['titulo'] }}"
                        >
                    </article>
                </div>
                @endforeach
        </div>
    </div>

    <div class="scroller" data-speed="slow">
        <ul class="tag-list scroller__inner ff-ultra fs-800">
            <li>testimonios ●</li>
            <li>testimonios ●</li>
            <li>testimonios ●</li>
            <li>testimonios ●</li>
        </ul>
    </div>
    <!-- testimonios -->
    <div class="container even-columns">
        @foreach ($testimonios as $item)
            <section class="testimonios | padding-block-start-10">
                <article class="testimonios__img-wrap | padding-inline-end-5">
                    <img
                        src="{{ $item['logoUrl'] }}"
                        alt="{{ $item['nombreEmpresa'] }} logo"
                    />
                </article>

                <article class="testimonios__texto">
                    <p>{!! $item['testimonio'] !!}</p>
                    <div class="ff-medium padding-block-start-4">
                        <span>{{ $item['nombreEmpresa'] }}</span>,
                        <span>{{ $item['representanteNombre'] }}</span>
                    </div>
                </article>
            </section>
        @endforeach
    </div>

    <div style="padding-block:clamp(5rem, 10vh, 6rem);">
        <x-proceso :proceso="$proceso"/>
    </div>

    <section class="blog-welcome | margin-block-5">
        <div class="container" data-type="wide">
            <header class="blog-welcome__header | text-center">
                <h1 class="ff-wide">Visita mi blog</h1>
                <h2 class="fs-600">¡Comparto contenido cada semana!</h2>
            </header>

            <article class="blog-welcome__posts | padding-block-end-0 padding-inline-13">
                @foreach ($blog as $item)
                    <a href="{{ route('posts.show', $item->slug) }}">
                        <div class="img-wrap">
                            <img
                                fetchpriority="high"
                                width="640"
                                height="640"
                                src="{{ $item->getFirstMediaUrl('thumbnails', 'medium') }}"  {{-- La imagen de tamaño medio como fallback --}}
                                srcset="
                                    {{ $item->getFirstMedia('thumbnails')->getUrl('small') }} 320w,
                                    {{ $item->getFirstMedia('thumbnails')->getUrl('medium') }} 640w,
                                    {{ $item->getFirstMedia('thumbnails')->getUrl('large') }} 1024w,
                                    {{ $item->getFirstMedia('thumbnails')->getUrl('extra-large') }} 1920w
                                "
                                alt="{{ $item->title }}"
                                class="border-radius-1"
                            >
                        </div>

                        <div class="post-details">
                            <h2 class="uppercase">{{ $item->category->name }}</h2>
                            <h1 class="ff-medium">{{ $item->title }}</h1>
                        </div>
                    </a>
                @endforeach
            </article>
        </div>
    </section>

    <!-- seccion CTA -->
    <section class="seccion-cta | section padding-inline-5" data-type="principal">
        <img class="seccion-cta__bg" src="/images/cta-bg.svg" alt="">
        <article class="seccion-cta__content | text-center">
            <x-seccionCTA
                :cta="$principalCTA"
                tipoBoton="primary"
            />
        </article>
    </section>

</x-site-layout>
