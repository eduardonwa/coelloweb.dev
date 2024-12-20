@foreach ($cta as $item)
    <div class="cta-inner">
        <article class="cta-inner__imagen">
            <img
                class="lazy"
                @if (isset($item['imagenUrl']))
                    <img src="{{ $item['imagenUrl'] }}" alt="Imagen" />
                @else
                @endif
        </article>

        <article class="cta-inner__copy">
            <h1 class="ff-display">{{ $item['encabezado'] }}</h1>
            @if(isset($item['subtitulo']) && is_array($item['subtitulo']))
                @foreach ($item['subtitulo'] as $subtitulo)
                    <p class="subtitulo">{!! $subtitulo !!}</p>
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
