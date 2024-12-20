<!-- si no existen categorias -->
@if ($categories->isEmpty())
    <div class="text-center w-full p-3 border-black text-xl no-categorias-wrap">
        <p class="text-woodsmoke-900 dark:text-woodsmoke-400">
            Parece que no hay entradas, vuelve pronto 👋
        </p>
    </div>
@endif

<div class="categorias-menu-wrap">
    @foreach ($categories as $category)
    <!-- si hay categorias activas, con un post -->
        @if ($category->posts->where('active', 1)->isNotEmpty())
            <a class="categoria-btn" href="{{ route('categories.show', $category->slug) }}">
                <div class="categoria-img-wrap">
                    <img
                        width="50"
                        height="50"
                        src="{{ $category->icon_url }}"
                        alt="{{ $category->name }}"
                    >
                </div>
                <h2>
                    {{ $category->name }}
                </h2>
            </a>
        @endif
    @endforeach
</div>
