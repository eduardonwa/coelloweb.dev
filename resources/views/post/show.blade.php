<x-blog-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6">
            <div class="overflow-hidden lg:w-2/3 lg:container lg:mx-auto">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header class="space-y-4">
                        <div class="flex space-x-2 items-center text-sm">
                            <a
                                href="{{ route('categories.show', $post->category->slug) }}"
                                class="font-semibold lg:text-woodsmoke-500 hover:text-black dark:hover:text-white transition-colors"
                            >
                                {{ $post->category->name }}
                            </a>
                            <span class="font-bold text-2xl">·</span>
                            <span>
                                {{ $post->getFormattedDate() }}
                            </span>
                        </div>

                        <div>
                            <h1 class="pb-5 text-monster-600 dark:text-monster-400 text-4xl font-bold">
                                {{ $post->title }}
                            </h1>
                            <span class="opacity-60 text-sm rounded-full">
                                {{ $post->human_read_time }}
                            </span>
                        </div>

                        <div class="flex flex-wrap items-baseline justify-start gap-2">
                            @foreach ($post->tags as $tag)
                                <span class="text-sm border rounded-md border-woodsmoke-200/30 p-1 dark:hover:bg-woodsmoke-900 cursor-pointer transition-colors">
                                    #{{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                        <img
                            src="{{ Storage::disk('public')->exists($post->thumbnail) ? Storage::url($post->thumbnail) : asset($post->thumbnail) }}"
                            alt="{{ $post->title }}"
                            class="w-full rounded-lg shadow-lg"
                        >
                    </header>

                    <div class="prose prose-lg max-w-full text-[20px] p-3 dark:text-woodsmoke-100 text-gray-900">
                        <p class="pt-2">
                            {{ $post->caption }}
                        </p>
                        <p class="leading-relaxed">
                            {!! $post->body !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blog-layout>
