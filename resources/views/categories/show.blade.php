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

    <div class="categoria-lista-posts-wrap breakout">
        @foreach ($category->posts as $post)
            @if ($post->active == 1)
            <a href="{{ route('posts.show', $post->slug) }}"
                class="categoria-lista-posts"
            >
                <div class="categoria-lista-post-resumen">
                    <h1>
                        {{ $post->title }}
                    </h1>
                    <h3>
                        {{ $post->human_read_time }}
                    </h3>
                </div>

                <div class="categoria-lista-img-wrap">
                    <img
                        src="{{ $category->icon_url }}" alt="{{ $post->title }}"
                        alt="{{ $post->title }}"
                    >
                </div>
            </a>
            @endif
        @endforeach
    </div>
</x-blog-layout>
