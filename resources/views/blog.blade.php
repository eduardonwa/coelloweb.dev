<x-blog-layout meta-description="¿Aún no tienes tu página web? ¡Yo te ayudo! Desde 500 pesos en adelante. Hablemos de ideas.">
    <!-- ultimos 3 posts -->
    <div class="ultimos-posts full-width">
        <!-- wrap -->
        <div class="left-wrap">
            <!-- inner w -->
            @foreach ($secondLast as $left)
            <a href="{{ route('posts.show', $left->slug) }}" class="left-post">
                <div class="left-img-wrap">
                    <img src="{{ Storage::disk('public')->exists($left->thumbnail) ? Storage::url($left->thumbnail) : asset($left->thumbnail) }}">
                </div>

                <div class="left-copy-wrap">
                    <div class="left-copy">
                        <h3>
                            {{ $left->category->name }}
                        </h3>
                        <h2>
                            {{ $left->title }}
                        </h2>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- wrap -->
        <div class="big-post">
            <!-- inner w -->
            @foreach($lastPost as $last)
            <a href="{{ route('posts.show', $last->slug) }}">
                <div class="big-post-img-wrapper">
                    <img src="{{ Storage::disk('public')->exists($last->thumbnail) ? Storage::url($last->thumbnail) : asset($last->thumbnail) }}">
                </div>

                <!-- inner w -->
                <div class="big-post-copy-wrap">
                    <div class="big-post-copy">
                        <h3>{{ $last->category->name }}</h3>
                        <h2>{{ $last->title }}</h2>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

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
                    <h3>DESARROLLO WEB</h1>
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
                    <img src="{{ Storage::disk('public')->exists($category->icon) ? Storage::url($category->icon) : asset($category->icon) }}">
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
                    <img src="{{ Storage::disk('public')->exists($featured->thumbnail) ? Storage::url($featured->thumbnail) : asset($featured->thumbnail) }}" alt="">
                </div>

                <!-- categoria, tiempo-->
                <div class="destacada-info">
                    <h3>{{ $featured->category->name }}</h3>
                    <h4>{{ $featured->human_read_time }}</h4>
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
                    <img src="{{ Storage::disk('public')->exists($more->thumbnail) ? Storage::url($more->thumbnail) : asset($more->thumbnail) }}">
                </div>

                <div class="lista-info">
                    <h3>{{ $more->category->name }}</h3>
                    <h4>{{ $more->human_read_time }}</h4>
                </div>

                <div class="lista-post">
                    <h1>{{ $more->title }}</h1>
                </div>
            </a>
            @endforeach
        </article>
    </section>
</x-blog-layout>
