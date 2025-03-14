<!-- incluir google script, meta title, meta description-->
<x-site-layout :metaTitle="'Eduardo Coello | Acerca'">
    <!-- heroe -->
    <section class="heroe | bg-seccion text-center test">
        <div class="heroe__acerca"">
            <img class="img-pilar-izq" src="/images/acerca-pilar-izq.svg" alt="">
            <div class="heroe__acerca__inner">
                <div class="acerca-cards">
                    <section class="hero-acerca">
                        @foreach ($queHaces as $item)
                            <article class="container flow">
                                <h1 class="ff-display fs-800">{{ $item['encabezado'] }}</h1>
                                @foreach ($item['subtitulo'] as $subtitulo)
                                    <h2>{!! $subtitulo !!}</h2>
                                @endforeach
                            </article>
                        @endforeach
                    </section>

                    <section class="intro-aha | flow" style="--flow-spacer: 1rem;">
                        @foreach ($introAha as $item)
                            <h2 class="ff-display fs-800 anim-header-intro-aha">{{ $item['encabezado'] }}</h2>
                            <div class="aha-copy | container even-columns">
                                <img
                                    class="m-auto lazy anim border-radius-2"
                                    src="{{ $item['lqip'] }}"
                                    data-src="{{ $item['imagenUrl'] }}"
                                    alt="{{ $item['encabezado'] }}"
                                >
                                <article>
                                    @foreach ($item['descripcion'] as $descripcion)
                                        <h2 class="aha-p">
                                            {!! $descripcion !!}
                                        </h2>
                                    @endforeach
                                </article>
                            </div>
                        @endforeach
                    </section>

                    <section class="declaracion">
                        @foreach ($declaracionPoderosa as $item)
                            <article class="container flow">
                                <h2 class="ff-display text-center anim">{{ $item['encabezado'] }}</h2>
                                @foreach ($item['descripcion'] as $descripcion)
                                    <p>{!! $descripcion !!}</p>
                                @endforeach
                            </article>
                        @endforeach
                    </section>
                </div>
            </div>
            <img class="img-pilar-der" src="/images/acerca-pilar-der.svg" alt="">
        </div>
    </section>

    <!-- historia -->
    <section class="section">
        <div class="container" data-type="narrow">
            @foreach($historia as $item)
                <div class="flow">
                    <h2 class="ff-display fs-700 text-center">{{ $item['encabezado'] }}</h2>
                    @foreach ($item['descripcion'] as $descripcion)
                        <p class="fs-600 padding-inline-3">{!! $descripcion !!}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    <!-- parte divertida -->
    <div class="parte-divertida | margin-block-start-8 margin-block-end-12">
        <div class="container">
            @foreach ($parteDivertida as $item)
                <h2 class="ff-display text-center fs-700 margin-block-end-4">
                    {{ $item['encabezado'] }}
                </h2>
                @foreach ($item['estoAquello'] as $subItem)
                    <article>
                        <div class="opcion-1">
                            <span class="{{ $subItem['eleccionPreferida'] === 'respuestaUno' ? 'preferida' : '' }} fs-600">
                                {{ $subItem['respuestaUno'] }}
                            </span>
                        </div>
                        <div class="opcion-2">
                            <span class="{{ $subItem['eleccionPreferida'] === 'respuestaDos' ? 'preferida' : '' }} fs-600">
                                {{ $subItem['respuestaDos'] }}
                            </span>
                        </div>
                    </article>
                @endforeach
            @endforeach
        </div>
    </div>

    <!-- zona cta -->
    <section class="seccion-cta | section padding-inline-5" data-type="acerca">
        <img class="seccion-cta__bg" src="/images/cta-bg.svg" loading="lazy" alt="">
        <article class="seccion-cta__content | text-center">
            <div class="container" data-type="narrow">
                <x-seccionCTA
                    :cta="$acercaCTA"
                    tipoBoton="primary"
                />
            </div>
        </article>
    </section>

    @vite('resources/js/animaciones/animaciones-acerca.js')
</x-site-layout>
