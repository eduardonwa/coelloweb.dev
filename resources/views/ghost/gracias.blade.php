<x-ghost-layout>
    @if (session()->has('message'))
        <section class="gracias-wrap breakout">
            <article class="alert-wrap">
                <div class="alert-success">
                    <h1>{{ session('message') }}</h1>
                    <p>Me estaré comunicando contigo dentro de 24 horas</p>
                </div>

                <div class="alert-redes-sociales">
                    <a href="https://www.facebook.com/coelloweb"><img src="/images/icon-negro-fb.svg" alt=""></a>
                    <a href="https://www.instagram.com/coelloweb"><img src="/images/icon-negro-ig.svg" alt=""></a>
                    <a href="https://github.com/eduardonwa"><img src="/images/icon-negro-github.svg" alt=""></a>
                    <a href="https://www.linkedin.com/in/coelloweb/"><img src="/images/icon-negro-linkedin.svg" alt=""></a>
                </div>
            </article>

            <article class="blog-wrap breakout">
                @foreach($ultimosDos as $post)
                <a
                    href="{{ route('posts.show', $post->slug) }}"
                    class="blog-post"
                >
                    {{-- <img src="{{ Storage::disk('public')->exists($post->thumbnail) ? Storage::url($post->thumbnail) : asset($post->thumbnail) }}"> --}}
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
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->caption }}</p>
                </a>
                @endforeach
            </article>
        </section>
    @endif
</x-ghost-layout>
