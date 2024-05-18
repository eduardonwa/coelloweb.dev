@if ($categories->isEmpty())
    <div class="text-center w-full p-3 border-black text-xl">
        <p class="text-woodsmoke-900 dark:text-woodsmoke-400">
            Parece que no hay entradas, vuelve pronto 👋
        </p>
    </div>
@endif
<div class="flex">
    <div class="hide-scrollbar mx-auto mb-3 mt-8 grid grid-flow-col justify-start gap-x-4 gap-y-5 overflow-auto px-[30px] md:mt-[65px]"
        style="grid-template-rows: repeat(1, 1fr); grid-auto-columns: 225px;"
    >
        @foreach ($categories as $category)
        <div class="flex flex-1 justify-center text-center md:max-w-[225px]">
            @if ($category->posts->where('active', 1)->isNotEmpty())
                <a class="relative transition-colors duration-300 bg-woodsmoke-200 hover:bg-woodsmoke-600/30 dark:bg-woodsmoke-900 dark:text-woodsmoke-200 dark:hover:bg-woodsmoke-900/50 flex h-full w-full flex-shrink-0 cursor-pointer flex-col justify-between rounded-2xl px-3 py-1 bg-blue/7 hover:bg-blue/13"
                    style="height: 84px; min-width: 192px;"
                    href="{{ route('categories.show', $category->slug) }}"
                >
                    <div class="flex flex-1 items-center">
                        <div class="mr-4 flex flex-shrink-0 justify-center">
                            <img
                                width="50"
                                height="50"
                                src="{{ Storage::disk('public')->exists($category->icon) ? Storage::url($category->icon) : asset($category->icon) }}"
                                alt="{{ $category->icon }}"
                                class="h-full"
                            >
                        </div>
                        <div class="w-full lg:w-auto flex justify-between md:block">
                            <h2 class="text-left text-base font-semibold leading-tight text-black">
                                {{ $category->name }}
                            </h2>
                        </div>
                    </div>
                </a>
            @endif
        </div>
        @endforeach
    </div>
</div>
