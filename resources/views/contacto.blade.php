<!-- incluir google script, meta title, meta description-->
<x-site-layout>
    <section class="heroe-contacto | padding-inline-5">
        <div class="container">
            <div class="contenedor">
                <!-- info contacto -->
                <article class="info-contacto">
                    @foreach ($contactoInfo as $item)
                        <a href="mailto:{{ $item['email'] }}">
                            {{ $item['email'] }}
                        </a>
                        <p>{{ $item['ubicacion'] }}</p>
                        <p>{{ $item['horario'] }}</p>
                    @endforeach
                </article>

                <article class="form-container">
                    <div class="form-container__copy | flow">
                        @foreach ($queHaces as $item)
                            <h1 class="fs-800">{{ $item['encabezado'] }}</h1>

                            @foreach ($item['subtitulo'] as $subtitulo)
                                <p>{!! $subtitulo !!}</p>
                            @endforeach

                        @endforeach
                        <div class="mensaje | italic">Los campos obligatorios van seguidos de <span aria-label="required">*</span>.</div>
                    </div>
                    <!-- formulario -->
                    @livewire('main-contact-form')
                </article>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="margin-block-14">
            <h1 class="ff-display fs-700 text-center">¿Tienes Preguntas?</h1>
            <div
                class="preguntas | container flow"
                data-type=""
                x-data="{ openIndex: null }"
            >
                @foreach($preguntas as $index => $item)
                    <div
                        class="preguntas__pregunta"
                        role="region"
                    >
                        <button
                            @click="openIndex = (openIndex === {{ $index }} ? null : {{ $index }})"
                            class="fs-500"
                        >
                            {{ $item['pregunta'] }}
                            <span x-show="openIndex !== {{ $index }}">&plus;</span>
                            <span x-show="openIndex === {{ $index }}">&minus;</span>
                        </button>

                        <div
                            class="preguntas__respuesta"
                            x-show="openIndex === {{ $index }}"
                            x-transition.opacity.scale.100.origin.top.duration.300ms
                            x-transition.opacity.scale.100.origin.bottom.duration.300ms
                        >
                            @foreach ($item['respuesta'] as $respuesta)
                                <p class="fs-500">{!! $respuesta !!}</p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('preguntas') }}" class="button test" data-type="preguntas">
                    Tengo más preguntas
                </a>
            </div>
        </div>
    </div>

    <!-- cta -->
    <section class="seccionCTA padding-inline-5" data-type="contacto">
        <article class="margin-block-end-12">
            <div class="container">
                <x-seccionCTA
                    :cta="$contactoCTA"
                    tipoBoton="acerca"
                />
            </div>
        </article>
    </section>
</x-site-layout>
