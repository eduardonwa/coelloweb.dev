<x-blog-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description" :meta-thumbnail="'storage/'.$post->thumbnail">

    <header class="post-header | container flow">

        <div class="post-header__categoria-fecha">
            <a
                href="{{ route('categories.show', $post->category->slug) }}">
                {{ $post->category->name }}
            </a>
            <span class="dot">·</span>
            <p>
                {{ $post->getFormattedDate() }}
            </p>
        </div>

        <div class="post-header__titulo-minutos">
            <h1>
                {{ $post->title }}
            </h1>
            <span>
                {{ $post->human_read_time }}
            </span>
        </div>

        <div class="post-header__etiquetas">
            @foreach ($post->tags as $tag)
                <span class="etiqueta">
                    #{{ $tag->name }}
                </span>
            @endforeach
        </div>

        <!-- img -->
        <div class="post-header__img-wrap">
            <img
                src="{{ $post->getFirstMediaUrl('thumbnails', 'medium') }}"  {{-- La imagen de tamaño medio como fallback --}}
                srcset="
                    {{ $post->getFirstMedia('thumbnails')->getUrl('small') }} 320w,
                    {{ $post->getFirstMedia('thumbnails')->getUrl('medium') }} 640w,
                    {{ $post->getFirstMedia('thumbnails')->getUrl('large') }} 1024w,
                    {{ $post->getFirstMedia('thumbnails')->getUrl('extra-large') }} 1920w
                "
                alt="{{ $post->title }}"
            >
        </div>
    </header>

    <article class="post container flow">
        <p class="post__caption">
            {{ $post->caption }}
        </p>
        <p class="post__body">
            {!! $post->body !!}
        </p>
    </article>
</x-blog-layout>
