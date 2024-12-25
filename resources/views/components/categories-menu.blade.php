<!-- si no existen categorias -->
@if ($categories->isEmpty())
    <p class="no-categoria">
        Parece que no hay entradas, vuelve pronto 👋
    </p>
@endif

<div class="categorias-menu | container" data-type="wide">
    @foreach ($categories as $category)
    <!-- si hay categorias activas, con un post -->
        @if ($category->posts->where('active', 1)->isNotEmpty())
            <a
                class="categorias-menu__btn"
                href="{{ route('categories.show', $category->slug) }}"
            >
                <div>
                    <img
                        width="50"
                        height="50"
                        src="{{ $category->iconUrl }}"
                        alt="{{ $category->name }}"
                        class="padding-2"
                    >
                </div>
                <h2>
                    {{ $category->name }}
                </h2>
            </a>
        @endif
    @endforeach
</div>
