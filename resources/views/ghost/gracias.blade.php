<x-ghost-layout>
    @if (session()->has('message'))
        <section class="gracias-wrap breakout">
            <article class="alert-wrap">
                <div class="alert-success">
                    <h1>{{ session('message') }}</h1>
                    <p>Me estaré comunicando contigo a la brevedad.</p>
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
                    <img src="{{ Storage::disk('public')->exists($post->thumbnail) ? Storage::url($post->thumbnail) : asset($post->thumbnail) }}">
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->caption }}</p>
                </a>
                @endforeach
            </article>
        </section>
    @endif
</x-ghost-layout>
