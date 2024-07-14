<x-blog-layout meta-title="Eduardo Coello - Categorías" meta-description="¿Aún no tienes tu pagina? ¡Yo te ayudo! Desde 500 pesos en adelante. Hablemos de ideas.">
    <header class="categorias-header">
        <h1>
            Navega mi contenido y selecciona el tema que más te atraiga
        </h1>
    </header>

    <x-categories-menu :categories="$categories" />

    <!-- lista categorias con posts -->
    <div class="categorias-lista-wrap breakout">
    @foreach ($categories as $category)
        @if ($category->posts->where('active', 1)->isNotEmpty())
        <a href="{{ route('categories.show', $category->slug) }}" class="categoria-etiqueta">
            {{ $category->name }}
        </a>
        @endif

        <div class="categoria-posts-wrap">
        @foreach ($category->posts as $post)
            @if ($post->active == 1)
            <a href="{{ route('posts.show', $post->slug) }}" class="categoria-post">
                <div class="categoria-post-resumen">
                    <h1 class="">
                        {{ $post->title }}
                    </h1>

                    <h3>
                        {{ $post->human_read_time }}
                    </h3>
                </div>

                <div class="categoria-post-img-wrap">
                    <img
                        src="{{ Storage::disk('public')->exists($post->thumbnail) ? Storage::url($post->thumbnail) : asset($post->thumbnail) }}" alt="{{ $post->title }}"
                        alt="{{ $post->title }}"
                    >
                </div>
            </a>
            @endif
        @endforeach
        </div>
    @endforeach
    </div>
</x-blog-layout>
