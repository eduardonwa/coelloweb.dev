<x-blog-layout meta-description="¿Aún no tienes tu página web? ¡Yo te ayudo! Hablemos de ideas.">
    <!-- ultimos 3 posts -->
    <section
        class="blog-featured | container"
        data-type="full-bleed"
    >
        <div class="blog-featured__wrapper">

            <article class="izquierda">
                <!-- izquierda inner wrap -->
                @foreach ($secondLast as $left)
                <a
                    href="{{ route('posts.show', $left->slug) }}"
                    class="izquierda__inner"
                >
                    <section class="inner-img">
                        <img
                            fetchpriority="high"
                            src="{{ $left->getFirstMediaUrl('thumbnails', 'medium') }}"
                            srcset="
                                {{ $left->getFirstMedia('thumbnails')->getUrl('small') }} 320w,
                                {{ $left->getFirstMedia('thumbnails')->getUrl('medium') }} 640w,
                                {{ $left->getFirstMedia('thumbnails')->getUrl('large') }} 1024w,
                                {{ $left->getFirstMedia('thumbnails')->getUrl('extra-large') }} 1920w
                            "
                            alt="{{ $left->title }}"
                            class="img-chica"
                        >
                    </section>

                    <section class="inner-detalles">
                        <h2>{{ $left->category->name }}</h2>
                        <h1 class="ff-medium">{{ $left->title }}</h1>
                    </section>
                </a>

                @endforeach
            </article>

            <article class="derecha">
                <!-- derecha inner wrap -->
                @foreach($lastPost as $last)
                    <a
                        href="{{ route('posts.show', $last->slug) }}"
                        class="derecha__inner"
                    >
                        <section class="inner-img">
                            <img
                                src="{{ $last->getFirstMediaUrl('thumbnails', 'medium') }}"  {{-- La imagen de tamaño medio como fallback --}}
                                srcset="
                                    {{ $last->getFirstMedia('thumbnails')->getUrl('small') }} 320w,
                                    {{ $last->getFirstMedia('thumbnails')->getUrl('medium') }} 640w,
                                    {{ $last->getFirstMedia('thumbnails')->getUrl('large') }} 1024w,
                                    {{ $last->getFirstMedia('thumbnails')->getUrl('extra-large') }} 1920w
                                "
                                alt="{{ $last->title }}"
                                class="img-grande"
                            >
                        </section>

                        <section class="inner-detalles">
                            <h2>{{ $left->category->name }}</h2>
                            <h1 class="ff-medium">{{ $last->title }}</h1>
                        </section>
                    </a>
                @endforeach
            </article>
        </div>
    </section>

    <!-- esencial para principiantes -->
    <section class="principiantes full-width border border-gray-400">
        <header class="principiantes-copy">
            <h1>
                Lo esencial para competir
            </h1>
            <p>
                Estos recursos están diseñados para principiantes y son perfectos si vas comenzando en tu travesía digital.
            </p>
            <button class="principiantes-cta">Leer artículos</button>
        </header>

        <!-- posts -->
        <article class="posts-principiantes">
            <a href="#">
                <div class="post-principiantes-img-wrap">
                    <img src="https://coelloweb.dev/storage/01HZ00YRNX2CG2G52W410TH675.webp" alt="">
                </div>

                <div class="posts-principiantes-copy">
                    <p>DESARROLLO WEB</p>
                    <h1>10 Consejos para un diseño web impresionante y efectivo</h1>
                </div>
            </a>
        </article>
    </section>

    <!-- explorar categorías -->
    <section class="categorias breakout">
        <h1>
            Lleva tu negocio al siguiente nivel
        </h1>

        <article class="categorias-wrap">
            @foreach ($categories as $category)
            <div class="categoria">
                <!-- icono -->
                <div class="categoria-img-wrapper">
                    <img
                        width="70"
                        height="70"
                        src="{{ $category->icon_url }}" alt="{{ $category->name }}">
                </div>

                <!-- categoria descripcion -->
                <div class="categoria-copy">
                    <h1>
                        {{ $category->name }}
                    </h1>
                    <p>
                        {{ $category->description }}
                    </p>
                    <a href="{{ route('categories.show', $category->slug) }}">
                        <button>
                            Leer más
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </article>
    </section>

    <!-- lista de publicaciones -->
    <section class="publicaciones full-width">
        <!-- post destacado -->
        <article class="destacada">
            @foreach ($featured as $featured)
            <a href="{{ route('posts.show', $featured->slug) }}">
                <div class="destacada-img-wrap">
                    <img
                        width="640"
                        height="640"
                        src="{{ $featured->getFirstMediaUrl('thumbnails', 'medium') }}"  {{-- La imagen de tamaño medio como fallback --}}
                        srcset="
                            {{ $featured->getFirstMedia('thumbnails')->getUrl('small') }} 320w,
                            {{ $featured->getFirstMedia('thumbnails')->getUrl('medium') }} 640w,
                            {{ $featured->getFirstMedia('thumbnails')->getUrl('large') }} 1024w,
                            {{ $featured->getFirstMedia('thumbnails')->getUrl('extra-large') }} 1920w
                        "
                        alt="{{ $featured->title }}"
                    >
                </div>

                <!-- categoria, tiempo-->
                <div class="destacada-info">
                    <p>{{ $featured->category->name }}</p>
                    <span>{{ $featured->human_read_time }}</span>
                </div>

                <!-- título, descripción -->
                <div class="destacada-post">
                    <h1>{{ $featured->title }}</h1>
                    <p>{{ $featured->caption }}</p>
                </div>
            </a>
            @endforeach
        </article>

        <article class="lista-publicaciones">
            @foreach ($morePosts as $more)
            <a href="{{ route('posts.show', $more->slug) }}">
                <div class="lista-img-wrap">
                    <img
                        width="640"
                        height="640"
                        src="{{ $more->getFirstMediaUrl('thumbnails', 'medium') }}"  {{-- La imagen de tamaño medio como fallback --}}
                        srcset="
                            {{ $more->getFirstMedia('thumbnails')->getUrl('small') }} 320w,
                            {{ $more->getFirstMedia('thumbnails')->getUrl('medium') }} 640w,
                            {{ $more->getFirstMedia('thumbnails')->getUrl('large') }} 1024w,
                            {{ $more->getFirstMedia('thumbnails')->getUrl('extra-large') }} 1920w
                        "
                        alt="{{ $more->title }}"
                    >
                </div>

                <div class="lista-info">
                    <p>{{ $more->category->name }}</p>
                    <span>{{ $more->human_read_time }}</span>
                </div>

                <div class="lista-post">
                    <h1>{{ $more->title }}</h1>
                </div>
            </a>
            @endforeach
        </article>
    </section>
</x-blog-layout>
