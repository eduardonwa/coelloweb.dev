<x-site-layout>
    <section class="gracias | container bg-seccion" data-type="full-bleed">
        <article class="gracias__wrapper">
            <div class="gracias__msg">
                <h2 class="heading-2">¡Gracias por tu mensaje!</h2>
                <p>Me comunicaré contigo lo más pronto posible.</p>
            </div>

            <div class="gracias__redes">
                <h2 class="fs-500">Sígueme en mis redes sociales</h2>
                <a href="https://www.facebook.com/coelloweb"> Facebook </a>
                <a href="https://www.instagram.com/eduardocoelloweb"> Instagram </a>
            </div>

            <div class="gracias__posts">
                @foreach($posts as $post)
                    <a
                        class="gracias__posts__wrapper"
                        href="{{ route('posts.show', $post->slug) }}"
                    >
                        <h2>{{ $post->title }}</h2>
                        <div class="post-img-wrapper">
                            <img
                                width="640"
                                height="640"
                                src="{{ $post->getFirstMediaUrl('thumbnails', 'medium') }}"  {{-- La imagen de tamaño medio como fallback --}}
                                srcset="
                                    {{ $post->getFirstMedia('thumbnails')->getUrl('small') }} 320w,
                                    {{ $post->getFirstMedia('thumbnails')->getUrl('medium') }} 640w,
                                    {{ $post->getFirstMedia('thumbnails')->getUrl('large') }} 1024w,
                                    {{ $post->getFirstMedia('thumbnails')->getUrl('extra-large') }} 1920w
                                "
                                alt="{{ $post->title }}"
                                class="border-radius-1 lazy"
                                loading="lazy"
                            >
                        </div>
                    </a>
                @endforeach
            </div>
        </article>
    </section>
</x-site-layout>
