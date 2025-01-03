<x-blog-layout metaDescription="Eduardo Coello | Blog Diseño Web">
    <!-- ultimos 3 posts -->
    <section
        class="blog-featured | container padding-block-start-10"
        data-type="wide"
    >
        <div class="blog-featured__wrapper">

            <article class="izquierda">
                <!-- izquierda inner wrap -->
                @foreach ($secondLast as $left)
                    <a
                        href="{{ route('posts.show', $left->slug) }}"
                        class="izquierda__inner"
                    >
                        <section class="izquierda__inner__img">
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
                                loading="lazy"
                            >

                            <div class="izquierda__inner__detalles">
                                <h2>{{ $left->category->name }}</h2>
                                <h1 class="ff-medium">{{ $left->title }}</h1>
                            </div>
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
                        <section class="derecha__inner__img">
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
                            <div class="derecha__inner__detalles">
                                <h2>{{ $left->category->name }}</h2>
                                <h1 class="ff-medium">{{ $last->title }}</h1>
                            </div>
                        </section>

                    </a>
                @endforeach
            </article>

        </div>
    </section>

    <!-- explorar categorías -->
    <div class="blog-categorias | section">
        <section class="blog-categorias__wrapper | container" data-type="full-bleed">
            <h2 class="blog-categorias__header | text-center">Lleva tu <span style="color: aqua;">negocio</span> al siguiente nivel</h2>
            <article class="blog-categorias__categoria | even-columns">
                @foreach ($categories as $category)
                    <div class="blog-categorias__inner | text-center">
                        <!-- icono -->
                        <img
                            width="70"
                            height="70"
                            src="{{ $category->icon_url }}" alt="{{ $category->name }}"
                            class="mx-auto"
                        />

                        <div class="blog-categorias__inner__copy | flow">
                            <h1>{{ $category->name }}</h1>

                            <p>{{ $category->description }}</p>

                            <a href="{{ route('categories.show', $category->slug) }}">
                                Leer más
                            </a>
                        </div>
                    </div>
                @endforeach
            </article>
        </section>
    </div>

    <!-- lista de publicaciones -->
    <section class="container" data-type="wide">
        <!-- post destacado -->
        <div class="publicaciones">
            <article class="publicaciones__destacada | flow">
                @foreach ($featured as $featured)
                    <div class="publicaciones__destacada__img-wrap">
                        <a href="{{ route('posts.show', $featured->slug) }}">
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
                        </a>
                    </div>

                    <!-- detalles -->
                    <div class="publicaciones__destacada__tiempo">
                        <span>{{ $category->name }}</span>
                        <span>&bull;</span>
                        <span>{{ $featured->human_read_time }}</span>
                    </div>

                    <!-- título, descripción -->
                    <div class="publicaciones__destacada__detalles | flow">
                        <a href="{{ route('posts.show', $featured->slug) }}">
                            <h1>{{ $featured->title }}</h1>
                        </a>
                        <p>{{ $featured->caption }}</p>
                    </div>

                @endforeach
            </article>

            <article class="publicaciones__lista">
                @foreach ($morePosts as $more)
                    <a
                        class="publicaciones__lista__wrap"
                        href="{{ route('posts.show', $more->slug) }}"
                    >
                        <article class="publicaciones__lista__wrap__img">
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
                        </article>

                        <div class="publicaciones__lista__wrap__detalles">
                            <h1>{{ $more->title }}</h1>
                            <span>{{ $more->human_read_time }}</span>
                        </div>
                    </a>
                    <hr class="margin-block-5">
                @endforeach
            </article>
        </div>
    </section>
</x-blog-layout>
