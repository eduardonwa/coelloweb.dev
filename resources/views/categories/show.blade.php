<x-blog-layout :meta-title="'Eduardo Coello -' . ' ' . $category->name" :meta-description="$category->description">
    <header class="categoria-header">
        <a
            href="{{ route('categories.index') }}"
            > Categorías
        </a>
        <span class="slash">/</span>
        <h1>
            {{ $category->name }}
        </h1>
    </header>

    <div class="categorias-posts__wrap container" data-type="wide">
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
</x-blog-layout>
