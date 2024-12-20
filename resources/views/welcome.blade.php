<x-site-layout>
    <!-- seccion de impacto/heroe -->
    @foreach($impacto as $item)
        <section class="hero | hero__top-space">
            <div class="container" data-type="full-bleed">
                <article class="even-columns">
                    <div class="flow">
                        <h1 class="hero__header">
                            {{ $item['encabezado'] }}
                        </h1>

                        @foreach ($item['subtitulo'] as $sub)
                            <p class="hero__subtitulo">{!! $sub !!}</p>
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
                            class="hero__image lazy"
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
            <div class="container" data-type="wide">
                <div class="even-columns">
                    <!-- -->
                    <header class="gran-problema__header">
                        <img
                            class="lazy"
                            src="{{ $item['lqip'] }}"
                            data-src="{{ $item['imagenUrl'] }}"
                            alt="{{ $item['encabezado'] }}"
                        >
                        <h1>{{ $item['encabezado'] }}</h1>
                    </header>

                    <!-- -->
                    <article class="gran-problema__copy">
                        <h1>{{ $item['subtitulo'] }}</h1>
                        @foreach($item['descripcion'] as $descripcion)
                            <p>{!! $descripcion !!}</p>
                        @endforeach
                    </article>
                </div>
            </div>
        </section>
    @endforeach

    <!-- porque Eduardo -->
    @foreach ($porqueEduardo as $item)
        <section class="section padding-inline-5">
            <div class="container" data-type="wide">
                <article class="porque-eduardo | even-columns">
                    <img
                        class="lazy"
                        src="{{ $item['lqip'] }}"
                        data-src="{{ $item['imagenUrl'] }}"
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
    <div class="container section" data-type="wide">
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
                            <img src="{{ $item['iconoCTA'] }}" alt="">
                        </a>
                    </article>
                    <!-- imagen -->
                    <article class="servicio-item__imagen">
                        <img
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

    <x-proceso :proceso="$proceso"/>

    <section class="blog | margin-block-5">
        <div class="container">
            <header class="blog__header | text-center">
                <h1 class="ff-wide">Visita mi blog</h1>
                <p class="fs-600">¡Comparto contenido cada semana!</p>
            </header>

            <article class="blog__posts | even-columns padding-block-end-0">
                @foreach ($blog as $item)
                    <a href="{{ route('posts.show', $item->slug) }}">
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
                        <div class="post-details">
                            <span>{{ $item->category->name }}</span>
                            <h1 class="uppercase ff-medium">{{ $item->title }}</h1>
                        </div>
                    </a>
                @endforeach
            </article>
        </div>
    </section>

    <!-- seccion CTA -->
    <section class="seccionCTA | section padding-inline-5" data-type="principal">
        <article class="text-center">
            <x-seccionCTA
                :cta="$principalCTA"
                tipoBoton="primary"
            />
        </article>
    </section>

</x-site-layout>
