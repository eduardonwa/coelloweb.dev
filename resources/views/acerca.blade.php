<!-- incluir google script, meta title, meta description-->
<x-site-layout>
    <!-- heroe -->
    <section class="heroe | section container text-center" data-type="narrow">
        @foreach ($queHaces as $item)
            <article class="flow">
                <h1 class="ff-display">{{ $item['encabezado'] }}</h1>
                @foreach ($item['subtitulo'] as $subtitulo)
                    <p>{!! $subtitulo !!}</p>
                @endforeach
            </article>
        @endforeach
    </section>

    <!-- introAha! -->
    <section class="section padding-inline-3">
        <div class="container">
            @foreach ($introAha as $item)
                <div class="even-columns">
                    <img
                        class="m-auto lazy"
                        src="{{ $item['lqip'] }}"
                        data-src="{{ $item['imagenUrl'] }}"
                        alt="{{ $item['encabezado'] }}"
                    >
                    <article class="flow">
                        <h1 class="ff-display fs-700">{{ $item['encabezado'] }}</h1>
                        @foreach ($item['descripcion'] as $descripcion)
                            <p class="copy-text">{!! $descripcion !!}</p>
                        @endforeach
                    </article>
                </div>
            @endforeach
        </div>
    </section>

    <!-- declaracion poderosa -->
    <section class="section">
        <div class="container flow" data-type="narrow">
            @foreach ($declaracionPoderosa as $item)
                <h1 class="ff-display text-center fs-700">{{ $item['encabezado'] }}</h1>
                @foreach ($item['descripcion'] as $descripcion)
                    <p class="copy-text padding-inline-3">{!! $descripcion !!}</p>
                @endforeach
            @endforeach
        </div>
    </section>

    <!-- historia -->
    <section class="section">
        <div class="container" data-type="narrow">
            @foreach($historia as $item)
                <div class="flow">
                    <h1 class="ff-display fs-700 text-center">{{ $item['encabezado'] }}</h1>
                    @foreach ($item['descripcion'] as $descripcion)
                        <p class="copy-text padding-inline-3">{!! $descripcion !!}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    <!-- parte divertida -->
    <div class="parte-divertida | margin-block-start-8 margin-block-end-12">
        <div class="container">
            @foreach ($parteDivertida as $item)
                <h1 class="ff-display text-center fs-700 margin-block-end-4">{{ $item['encabezado'] }}</h1>
                    @foreach ($item['estoAquello'] as $subItem)
                        <article>
                            <div class="opcion-1">
                                <span class="{{ $subItem['eleccionPreferida'] === 'respuestaUno' ? 'preferida' : '' }} copy-text">
                                    {{ $subItem['respuestaUno'] }}
                                </span>
                            </div>
                            <div class="opcion-2">
                                <span class="{{ $subItem['eleccionPreferida'] === 'respuestaDos' ? 'preferida' : '' }} copy-text">
                                    {{ $subItem['respuestaDos'] }}
                                </span>
                            </div>
                        </article>
                    @endforeach
            @endforeach
        </div>
    </div>

    <!-- zona cta -->
    <section class="seccionCTA padding-inline-5" data-type="acerca">
        <article class="section text-center">
            <div class="container" data-type="narrow">
                <x-seccionCTA
                    :cta="$acercaCTA"
                    tipoBoton="primary"
                />
            </div>
        </article>
    </section>

</x-site-layout>
