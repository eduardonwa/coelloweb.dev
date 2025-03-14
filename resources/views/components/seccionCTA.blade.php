@foreach ($cta as $item)
    <div class="cta-inner">
        <article class="cta-inner__imagen">
            <img
                class="lazy"
                loading="lazy"
                alt=""
                @if (isset($item['imagenUrl']))
                    src="{{ $item['imagenUrl'] }}" alt="" />
                @else
                @endif
        </article>

        <article class="cta-inner__copy">
            <h2 class="ff-display">{{ $item['encabezado'] }}</h2>
            @if(isset($item['subtitulo']) && is_array($item['subtitulo']))
                @foreach ($item['subtitulo'] as $subtitulo)
                    <h3 class="subtitulo">{!! $subtitulo !!}</h3>
                @endforeach
            @endif

            <a
                href="{{ $item['enlaceCTA'] }}"
                class="button"
                data-type="{{ $tipoBoton }}"
            >
                {{ $item['botonCTA']['textoCTA'] }}
            </a>
        </article>
    </div>
@endforeach
