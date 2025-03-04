<x-blog-layout meta-title="Eduardo Coello - Categorías" meta-description="¿Aún no tienes tu pagina? ¡Yo te ayudo! Desde 500 pesos en adelante. Hablemos de ideas.">
    <x-categories-menu :categories="$categories" />

    <!-- lista categorias con posts -->
    <div class="categorias-posts | container" data-type="wide">
        @foreach ($categories as $category)
            @if ($category->posts->where('active', 1)->isNotEmpty())
                <a
                    class="categorias-posts__etiqueta | ff-medium"
                    href="{{ route('categories.show', $category->slug) }}"
                >
                    {{ $category->name }}
                </a>
            @endif

            <div class="categorias-posts__wrap">
                @foreach ($category->posts as $post)
                    @if ($post->active == 1)
                        <a
                            class="categorias-posts__wrap__articulo"
                            href="{{ route('posts.show', $post->slug) }}"
                        >
                            <div class="categorias-posts__wrap__articulo__resumen">
                                <h1>
                                    {{ $post->title }}
                                </h1>

                                <h3>
                                    {{ $post->human_read_time }}
                                </h3>
                            </div>

                            <div class="categorias-posts__wrap__articulo__img-wrap">
                                <img
                                    fetchpriority="high"
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
                                    class="border-radius-1"
                                >
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</x-blog-layout>
