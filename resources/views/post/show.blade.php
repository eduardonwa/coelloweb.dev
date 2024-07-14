<x-blog-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <header class="post-header">
        <!-- categoria y fecha -->
        <div class="post-categoria-fecha">
            <a
                href="{{ route('categories.show', $post->category->slug) }}">
                {{ $post->category->name }}
            </a>
            <span class="dot">·</span>
            <p>
                {{ $post->getFormattedDate() }}
            </p>
        </div>

        <!-- titulo y minutos -->
        <div class="post-titulo-minutos">
            <h1>
                {{ $post->title }}
            </h1>
            <span>
                {{ $post->human_read_time }}
            </span>
        </div>

        <!-- tags -->
        <div class="post-etiquetas">
            @foreach ($post->tags as $tag)
                <span class="etiqueta">
                    #{{ $tag->name }}
                </span>
            @endforeach
        </div>

        <!-- img -->
        <div class="post-img-wrap">
            <img
                src="{{ Storage::disk('public')->exists($post->thumbnail) ? Storage::url($post->thumbnail) : asset($post->thumbnail) }}"
                alt="{{ $post->title }}"
            >
        </div>
    </header>

    <article class="prose-lg post-body-wrap">
        <p class="pt-2">
            {{ $post->caption }}
        </p>
        <p class="body-post">
            {!! $post->body !!}
        </p>
    </article>
</x-blog-layout>
