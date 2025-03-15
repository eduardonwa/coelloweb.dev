<!-- incluir google script, meta title, meta description-->
<x-site-layout :metaTitle="'Eduardo Coello | Contáctame'">
    <section class="heroe-contacto | bg-seccion padding-inline-5">
        <div class="container">
            <div class="contenedor">
                <!-- info contacto -->
                <article class="info-contacto">
                    @foreach ($contactoInfo as $item)
                        <img src="{{ $item['fotoPerfilUrl'] }}" alt="">
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

    <x-preguntas :preguntas="$preguntas"></x-preguntas>

    <!-- cta -->
    <section class="seccion-cta | padding-inline-5" data-type="contacto">
        <img class="seccion-cta__bg" src="/images/cta-bg.svg" loading="lazy" alt="">
        <article class="seccion-cta__content | margin-block-end-12">
            <div class="container">
                <x-seccionCTA
                    :cta="$contactoCTA"
                    tipoBoton="acerca"
                />
            </div>
        </article>
    </section>

    @push('scripts')
        <!-- Event snippet for Enviar formulario de clientes potenciales conversion page -->
        <script>
            gtag('event', 'conversion', {'send_to': 'AW-11198361905/B7QVCKnO0aoaELHi5dsp'});
        </script>
    @endpush
</x-site-layout>
