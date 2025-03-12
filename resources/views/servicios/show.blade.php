<x-site-layout :meta-title="'Crea tu ' . $tituloServicio . ' | Eduardo Coello'">
    <!-- 1 sección héroe -->
    <section class="section text-center bg-seccion">
        <article class="flow container" data-type="full-bleed">
            <div class="ventas-heroe">
                @foreach ($seccionHeroe as $item)
                    
                    <div class="ventas-heroe__copy">
                        <h1 class="ff-wide">{{ $item['encabezado'] }}</h1>
                        @foreach ($item['subtitulo'] as $subtitulo)
                            <h2>{!! $subtitulo !!}</h2>
                        @endforeach
                    </div>

                    <div class="ventas-heroe__img">
                        <img src="{{ $item['imagenUrl'] }}" alt="">
                    </div>
                @endforeach
            </div>
        </article>
    </section>

    <!-- 2 resultado perfecto -->
    @if ($secciones['resultadoPerfecto'] ?? false)
        <section class="">
            <article class="container">
                <div class="resultado-perfecto">
                    <h2 class="ff-medium">{{ $secciones['resultadoPerfecto']['titulo'] }}</h2>
                    <br>
                    @foreach ($secciones['resultadoPerfecto']['descripcion'] as $descripcion)
                        <p>{!! $descripcion !!}</p>
                    @endforeach
                    <div class="padding-block-8">
                        <hr
                            width="1"
                            size="500"
                            style="
                                margin: 0 auto;
                            "
                        />
                    </div>
                </div>
            </article>
        </section>
    @endif

    <!-- 3 agitación -->
    @if ($secciones['agitacion'] ?? false)
        <section class="margin-block-end-15">
            <article class="container">
                <div class="agitacion">
                    <h2>{{ $secciones['agitacion']['titulo'] }}</h2>
                    @foreach ($secciones['agitacion']['descripcion'] as $descripcion)
                        <p>{!! $descripcion !!}</p>
                    @endforeach
                </div>
            </article>
        </section>
    @endif

    <!-- 4 porque esto -->
    @if ($secciones['porqueEsto'] ?? false)
        <section class="section">
            <article class="container" data-type="wide">
                <div class="porque-esto | even-columns">
                    <img
                        src="{{ $secciones['porqueEsto']['imagenUrl'] }}"
                        alt="">
                    <div class="porque-esto__copy | flow">
                        <h2>{{ $secciones['porqueEsto']['titulo'] }}</h2>
                        @foreach ($secciones['porqueEsto']['descripcion'] as $descripcion)
                            <p>{!! $descripcion !!}</p>
                        @endforeach
                    </div>
                </div>
            </article>
        </section>
    @endif
    
    <div class="linea-1-wrap">
        <img class="linea-1" src="{{asset('images/sales-page/linea-1.svg')}}" alt="">
    </div>
    <!-- 5 intro solución -->
    @if ($secciones['introSolucion'] ?? false)
        <section class="section">
            <article class="container">
                <div class="intro-solucion | text-center flow">
                    <h2>{{ $secciones['introSolucion']['titulo'] }}</h2>
                    @foreach ($secciones['introSolucion']['descripcion'] as $descripcion)
                        <p>{!! $descripcion !!}</p>
                    @endforeach
                    <div class="intro-solucion__img-wrap">
                        <img
                            class="mx-auto"
                            src="{{ $secciones['introSolucion']['imagenUrl'] }}"
                            alt="logo AJ"
                        >
                    </div>
                </div>
            </article>
        </section>
    @endif

    <!-- 6 lo que necesitas -->
    @if($bloques['lista']['loQueNecesitas'] ?? false)
        <section class="section">
            <article class="lo-que-necesitas | container">
                <header class="text-center flow">
                    <h2 class="ff-wide">{{ $bloques['lista']['loQueNecesitas']['titulo'] }}</h2>
                    @if ($bloques['lista']['loQueNecesitas']['subtitulo'] ?? false)
                        @foreach ($bloques['lista']['loQueNecesitas']['subtitulo'] as $subtitulo)
                            <h3>{!! $subtitulo !!}</h3>
                        @endforeach
                    @endif
                </header>

                @if ($bloques['lista']['loQueNecesitas']['items'] ?? false)
                    <div class="lo-que-necesitas__lista">
                        @foreach ($bloques['lista']['loQueNecesitas']['items'] as $item)
                            <div class="lo-que-necesitas__lista__item">
                                @if ($item['iconoUrl'] ?? $bloques['lista']['loQueNecesitas']['iconoUrl'])
                                    <img src="{{ $item['iconoUrl'] ?? $bloques['lista']['loQueNecesitas']['iconoUrl'] }}"
                                        alt="{{ $item['titulo'] }}">
                                @endif

                                <div class="lo-que-necesitas__lista__item__inner">
                                    <h2>{{ $item['titulo'] }}</h2>
                                    @foreach ($item['descripcion'] as $descripcion)
                                        <p>{!! $descripcion !!}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                @endif

                @if ($item['iconoUrl'])
                    <img src="{{ $item['iconoUrl'] }}" alt="{{ $item['titulo'] }}">
                @endif
            </article>
        </section>
    @endif

    <!-- 7 bondades -->
    @if($bloques['lista']['bondades'] ?? false)
        <section class="section">
            <article class="bondades | container" data-type="wide">
                <header class="flow text-center">
                    <h2 class="ff-wide">{{ $bloques['lista']['bondades']['titulo'] }}</h2>
                    @if ($bloques['lista']['bondades']['subtitulo'] ?? false)
                        @foreach ($bloques['lista']['bondades']['subtitulo'] as $subtitulo)
                            <h3>{!! $subtitulo !!}</h3>
                        @endforeach
                    @endif
                </header>

                @if ($bloques['lista']['bondades']['items'] ?? false)
                    <div class="bondades__lista">
                        @foreach ($bloques['lista']['bondades']['items'] as $item)
                            <div class="bondades__lista__item | flow">

                                <div class="bondades__lista__item__header">
                                    @if ($item['iconoUrl'] ?? $bloques['lista']['bondades']['iconoUrl'])
                                        <img src="{{ $item['iconoUrl'] ?? $bloques['lista']['bondades']['iconoUrl'] }}"
                                            alt="{{ $item['titulo'] }}">
                                    @endif
                                    <h2>{{ $item['titulo'] }}</h2>
                                </div>

                                <div class="bondades__lista__item__copy">
                                    @foreach ($item['descripcion'] as $descripcion)
                                        <p>{!! $descripcion !!}</p>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    </div>
                @else
                @endif
            </article>
        </section>
    @endif

    <!-- 8 como funciona -->
    @if($bloques['lista']['comoFunciona'] ?? false)
        <section class="section">
            <article class="como-funciona | container">
                <header class="text-center flow">
                    <h2 class="ff-wide">{{ $bloques['lista']['comoFunciona']['titulo'] }}</h2>
                    @if ($bloques['lista']['comoFunciona']['subtitulo'] ?? false)
                        @foreach ($bloques['lista']['comoFunciona']['subtitulo'] as $subtitulo)
                            <h3>{!! $subtitulo !!}</h3>
                        @endforeach
                    @endif
                </header>

                @if ($bloques['lista']['comoFunciona']['items'] ?? false)
                    <div class="como-funciona__lista">
                        @foreach ($bloques['lista']['comoFunciona']['items'] as $item)
                            <div class="como-funciona__lista__item">

                                @if ($item['iconoUrl'] ?? $bloques['lista']['comoFunciona']['iconoUrl'])
                                    <img src="{{ $item['iconoUrl'] ?? $bloques['lista']['comoFunciona']['iconoUrl'] }}"
                                        alt="{{ $item['titulo'] }}">
                                @endif

                                <div class="como-funciona__lista__item__inner">
                                    <h2>{{ $item['titulo'] }}</h2>
                                    @foreach ($item['descripcion'] as $descripcion)
                                        <p>{!! $descripcion !!}</p>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No hay ítems en la lista.</p>
                @endif

                @if ($item['iconoUrl'])
                    <img src="{{ $item['iconoUrl'] }}" alt="{{ $item['titulo'] }}">
                @endif
            </article>
        </section>
    @endif

    <!-- 9 testimonio corto -->
    @if ($secciones['testimonioCorto'] ?? false)
        <section style="background-color: hsl(183.16, 100%, 22.35%); color: hsl(240, 6.67%, 97.06%);" class="section">
            <article class="container">
                <div class="testimonio-corto | flow text-center">
                    <div class="testimonio-corto__texto | flow">
                        <h2 class="ff-medium">{{ $secciones['testimonioCorto']['titulo'] }}</h2>
                        @foreach ($secciones['testimonioCorto']['descripcion'] as $descripcion)
                            <p>{!! $descripcion !!}</p>
                        @endforeach
                    </div>
                    <img
                        class="mx-auto"
                        width="80"
                        height="100"
                        src="{{ $secciones['testimonioCorto']['imagenUrl'] }}"
                        alt="logo AJ"
                    >
                </div>
            </article>
        </section>
    @endif

    <!-- 10 confianza -->
    @if($bloques['lista']['confianza'] ?? false)
        <section class="section">
            
            <div class="linea-2-wrap">
                <hr class="linea-2">
            </div>
            
            <article class="confianza | container" data-type="full-bleed">
                <header>
                    <h2 class="ff-medium">{{ $bloques['lista']['confianza']['titulo'] }}</h2>
                    @if ($bloques['lista']['confianza']['subtitulo'] ?? false)
                        @foreach ($bloques['lista']['confianza']['subtitulo'] as $subtitulo)
                            <h3>{!! $subtitulo !!}</h3>
                        @endforeach
                    @endif
                </header>

                @if ($bloques['lista']['confianza']['items'] ?? false)
                    <div class="confianza__lista | container" data-type="full-bleed">
                        @foreach ($bloques['lista']['confianza']['items'] as $item)
                            <div class="confianza__lista__item | flow">
                                <h2 class="ff-display">{{ $item['titulo'] }}</h2>
                                @foreach ($item['descripcion'] as $descripcion)
                                    <h3>{!! $descripcion !!}</h3>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No hay ítems en la lista.</p>
                @endif

                @if ($item['iconoUrl'])
                    <img src="{{ $item['iconoUrl'] }}" alt="{{ $item['titulo'] }}">
                @endif
            </article>
        </section>
    @endif

    <!-- 11 unica opcion -->
    @if ($secciones['unicaOpcion'] ?? false)
        <section class="section">
            <article class="unica-opcion | container" data-type="wide">
                <div class="padding-block-8">
                    <hr
                        width="1"
                        size="100"
                        style="
                            margin: 0 auto;
                        "
                    />
                </div>
                <h2 class="ff-wide text-center">{{ $secciones['unicaOpcion']['titulo'] }}</h2>
                @foreach ($secciones['unicaOpcion']['descripcion'] as $descripcion)
                    <p>{!! $descripcion !!}</p>
                @endforeach
                <div class="padding-block-8">
                    <hr
                        width="1"
                        size="100"
                        style="
                            margin: 0 auto;
                        "
                    />
                </div>
            </article>
        </section>
    @endif

    <!-- 12 que incluye -->
    @if($bloques['lista']['queIncluye'] ?? false)
        <section class="section">
            <article class="que-incluye | container" data-type="wide">
                <h2 class="ff-wide text-center">{{ $bloques['lista']['queIncluye']['titulo'] }}</h2>

                @if ($bloques['lista']['queIncluye']['items'] ?? false)
                    <div class="que-incluye__lista">
                        @foreach ($bloques['lista']['queIncluye']['items'] as $item)
                        {{-- @if ($item['iconoUrl'] ?? $bloques['lista']['queIncluye']['iconoUrl'])
                            <img src="{{ $item['iconoUrl'] ?? $bloques['lista']['queIncluye']['iconoUrl'] }}"
                                alt="{{ $item['titulo'] }}">
                            @endif
                        --}}
                        <h2 class="ff-medium">{{ $item['titulo'] }}</h2>

                        <div class="que-incluye__lista__item | flow">
                            @foreach ($item['descripcion'] as $descripcion)
                                <p>{!! $descripcion !!}</p>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                @else
                @endif

                @if ($item['iconoUrl'])
                    <img src="{{ $item['iconoUrl'] }}" alt="{{ $item['titulo'] }}">
                @endif

                <!-- precio -->
                @if ($bloques['lista']['queIncluye']['subtitulo'] ?? false)
                    <article class="que-incluye__precio | text-center">
                        @foreach ($bloques['lista']['queIncluye']['subtitulo'] as $subtitulo)
                            <p class="ff-medium">{!! $subtitulo !!}</p>
                        @endforeach
                    </article>
                @endif
            </article>
        </section>
    @endif

    <!-- 13 desglose precios -->
    @if ($bloques['desglosePrecios'][0] ?? false)
        <section class="section">
            <article class="desglose-precios | container even-columns">
                <h2 class="ff-medium">{{ $bloques['desglosePrecios'][0]['encabezado'] }}</h2>
                <div class="desglose-precios__descripcion">
                    @foreach ($bloques['desglosePrecios'][0]['descripcionPrecios'] as $descripcion)
                        <p>{{ $descripcion['plazo'] }} plazos de <br> <span class="ff-display"> $ {{ $descripcion['cantidad'] }}</span> </p>
                    @endforeach
                </div>
            </article>
        </section>
    @endif

    <!-- 14 plazas cta -->
    @if ($plazasCTA = $bloquesHelper->obtenerBloque($bloques, 'seccionCTA', 'plazasCTA'))
        <section class="section">
            <article class="plazas-cta | container text-center flow">
                <h2 class="ff-wide">{{ $plazasCTA['encabezado'] }}</h2>
                @foreach ($plazasCTA['subtitulo'] as $subtitulo)
                    <h3>{!! $subtitulo !!}</h3>
                @endforeach
                <a
                    href="{{ url($plazasCTA['botonCTA']['enlace']) }}"
                    class="button"
                    data-type="primary"
                >
                    {{ $plazasCTA['botonCTA']['textoCTA'] }}
                </a>
            </article>
        </section>
    @endif

    <!-- 15 testimonio one -->
    @if ($secciones['testimonioOne'] ?? false)
        <section style="background-color: hsl(183.16, 100%, 22.35%); color: hsl(240, 6.67%, 97.06%);" class="section">
            <article class="container">
                <div class="testimonio-one | flow text-center">
                    <div class="testimonio-one__texto | flow">
                        <h2 class="ff-medium">{{ $secciones['testimonioOne']['titulo'] }}</h2>
                        @foreach ($secciones['testimonioOne']['descripcion'] as $descripcion)
                            <p>{!! $descripcion !!}</p>
                        @endforeach
                    </div>

                    <img
                        class="mx-auto"
                        width="80"
                        src="{{ $secciones['testimonioOne']['imagenUrl'] }}"
                        alt="logo Space Caps"
                    >
                </div>
            </article>
        </section>
    @endif

    <!-- 16 garantía cta -->
    @if ($garantiaCTA = $bloquesHelper->obtenerBloque($bloques, 'seccionCTA', 'garantiaCTA'))
        <section class="garantia-cta-wrap | section">
            <img class="garantia-cta-wrap__bg" src="/images/bg-problema.svg" alt="">
            <article class="garantia-cta | container text-center flow" data-type="wide">
                <h2 class="ff-wide">{{ $garantiaCTA['encabezado'] }}</h2>
                @foreach ($garantiaCTA['subtitulo'] as $subtitulo)
                    <h3>{!! $subtitulo !!}</h3>
                @endforeach
                <a
                    href="{{ url($plazasCTA['botonCTA']['enlace']) }}"
                    class="button"
                    data-type="primary"
                >
                    {{ $garantiaCTA['botonCTA']['textoCTA'] }}
                </a>
            </article>
        </section>
    @endif

    <!-- 17 porque yo -->
    @if ($secciones['porqueYo'] ?? false)
        <section class="section">
            <article class="porque-yo | container even-columns">
                <img
                    class="mx-auto"
                    src="{{ $secciones['porqueYo']['imagenUrl'] }}"
                    alt="Foto de perfil Eduardo Coello"
                >
                <div class="porque-yo__inner | flow">
                    <h2 class="ff-wide">{{ $secciones['porqueYo']['titulo'] }}</h2>
                    @foreach ($secciones['porqueYo']['descripcion'] as $descripcion)
                        <p>{!! $descripcion !!}</p>
                    @endforeach
                </div>
            </article>
        </section>
    @endif

    <!-- 18 candidato perfecto -->
    @if($bloques['lista']['candidatoAdecuado'] ?? false)
        <section class="section">
            <article class="candidato-adecuado | container">
                <h2 class="ff-wide text-center">{{ $bloques['lista']['candidatoAdecuado']['titulo'] }}</h2>
                @if ($bloques['lista']['candidatoAdecuado']['items'] ?? false)

                    <div class="candidato-adecuado__lista">
                        @foreach ($bloques['lista']['candidatoAdecuado']['items'] as $item)
                            <div class="candidato-adecuado__lista__item">
                                <h2 class="ff-display">{{ $item['titulo'] }}</h2>

                                <div class="candidato-adecuado__lista__descripciones">
                                    @foreach ($item['descripcion'] as $descripcion)
                                        <p>{!! $descripcion !!}</p>
                                    @endforeach
                                </div>
                            </div>

                        @endforeach
                    </div>

                @else
                @endif

                @if ($item['iconoUrl'])
                    <img src="{{ $item['iconoUrl'] }}" alt="{{ $item['titulo'] }}">
                @endif
                <hr
                    width="1"
                    size="100"
                    style="
                        margin: 0 auto;
                    "
                />
                @if ($bloques['lista']['candidatoAdecuado']['subtitulo'] ?? false)
                    <div class="candidato-adecuado__copy">
                        @foreach ($bloques['lista']['candidatoAdecuado']['subtitulo'] as $subtitulo)
                            <h3>{!! $subtitulo !!}</h3>
                        @endforeach
                    </div>
                @endif
            </article>
        </section>
    @endif

    <!-- 19 preguntas -->
    <x-preguntas :preguntas="$preguntas"></x-preguntas>

    <!-- 20 transforma cta -->
    @if ($transformaCTA = $bloquesHelper->obtenerBloque($bloques, 'seccionCTA', 'transformaCTA'))
        <section class="section">
            <article class="transforma-cta | container text-center flow">
                <h2 class="ff-wide">{{ $transformaCTA['encabezado'] }}</h2>
                @foreach ($transformaCTA['subtitulo'] as $subtitulo)
                    <h3>{!! $subtitulo !!}</h3>
                @endforeach
                <a
                    href="{{ url($plazasCTA['botonCTA']['enlace']) }}"
                    class="button"
                    data-type="primary"
                >
                    {{ $transformaCTA['botonCTA']['textoCTA'] }}
                </a>
            </article>
        </section>
    @endif
</x-site-layout>
