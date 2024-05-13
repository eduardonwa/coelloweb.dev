<x-blog-layout :meta-title="'Eduardo Coello -' . ' ' . $category->name" :meta-description="$category->description">
    <div class="mx-auto container px-0 lg:px-[30px]">
        <div class="flex justify-center items-center space-x-2 mt-6 mb-8 px-10 text-center">
            <a
                href="{{ route('categories.index') }}"
                class="text-2xl sm:text-3xl text-woodsmoke-400 hover:text-woodsmoke-800 transition-colors duration-300"
                > Categorías
            </a>
            <span class="text-2xl sm:text-3xl font-light text-woodsmoke-300">/</span>
            <h1 class="text-2xl sm:text-3xl leading-none text-smoke dark:text-woodsmoke-200">
                {{ $category->name }}
            </h1>
        </div>

        <div class="py-8 hide-scrollbar flex gap-6 overflow-auto px-[30px] w-[calc(100w)] xl:grid xl:grid-cols-3 xl:auto-cols-[377px] xl:grid-cols-[repeat(3, 1fr)] xl:px-0 xl:w-auto">
            @foreach ($category->posts as $post)
                @if ($post->active == 1)
                    <div
                        class="group flex w-full flex-shrink-0 flex-grow-0 border rounded-md hover:border-woodsmoke-600/30 dark:hover:border-monster-800 dark:border-woodsmoke-400/25 bg-woodsmoke-200 dark:bg-woodsmoke-950 dark:hover:bg-woodsmoke-900/50 dark:text-woodsmoke-200 p-3 overflow-hidden transition-colors duration-300""
                        style="max-width: 443px;"
                    >
                        <a href="{{ route('posts.show', $post->slug) }}"
                            class="flex flex-col justify-between items-center text-center"
                        >
                            <header class="pb-4">
                                <p class="pb-3 font-semibold text-2xl">
                                    {{ $post->title }}
                                </p>
                                <div class="flex justify-center items-center space-x-2">
                                    <p class="text-sm text-woodsmoke-700">
                                        @if ($post->published_at->diffInWeeks(now()) >= 1)
                                            {{ $post->getFormattedDate() }}
                                        @else
                                            {{ $post->published_at->diffForHumans() }}
                                        @endif
                                    </p>
                                    <span class="font-bold text-xl"> · </span>
                                    <span class="text-sm text-woodsmoke-700">
                                        {{ $post->human_read_time }}
                                    </span>
                                </div>
                            </header>
                            <img
                                class="rounded-md scale-100 group-hover:scale-110 transition ease-in-out duration-700"
                                style=""
                                src="{{ Storage::disk('public')->exists($post->thumbnail) ? Storage::url($post->thumbnail) : asset($post->thumbnail) }}" alt="{{ $post->title }}"
                                alt="{{ $post->title }}"
                            >
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-blog-layout>
