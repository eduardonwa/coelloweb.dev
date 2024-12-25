<x-blog-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description" :meta-thumbnail="'storage/'.$post->thumbnail">
    <div class="blog-post | container">
        <header class="blog-post__header | even-columns margin-inline-4">
            <div class="blog-post__header__img-wrap">
                <img
                    src="{{ $post->getFirstMediaUrl('thumbnails', 'medium') }}"
                    srcset="
                        {{ $post->getFirstMedia('thumbnails')->getUrl('small') }} 320w,
                        {{ $post->getFirstMedia('thumbnails')->getUrl('medium') }} 640w,
                        {{ $post->getFirstMedia('thumbnails')->getUrl('large') }} 1024w,
                        {{ $post->getFirstMedia('thumbnails')->getUrl('extra-large') }} 1920w
                    "
                    alt="{{ $post->title }}"
                >
            </div>

            <div class="post-info | flow">
                <h1>{{ $post->title }}</h1>
                <span>{{ $post->human_read_time }}</span>
                <a
                    href="{{ route('categories.show', $post->category->slug) }}"
                    >{{ $post->category->name }}</a>
                <p>{{ $post->getFormattedDate() }}</p>
                <p class="caption">{{ $post->caption }}</p>
            </div>
        </header>

        <hr>

        <article class="blog-post__body | container flow" data-type="blog-post">
            <p>
                {!! $post->body !!}
            </p>
        </article>
    </div>
</x-blog-layout>
