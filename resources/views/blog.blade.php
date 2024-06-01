<x-blog-layout meta-description="¿Aún no tienes tu página web? ¡Yo te ayudo! Desde 500 pesos en adelante. Hablemos de ideas.">
    <div class="overflow-hidden max-w-7xl mx-auto mt-8 pb-16 space-y-12 p-3 text-gray-900 dark:text-gray-100 lg:px-8 lg:grid lg:grid-cols-2">
        <div class="text-center lg:px-8 py-8 lg:col-span-2">
            <p class="text-lg pb-8 dark:text-woodsmoke-50 text-smoke">
                <span>Mi objetivo es crear interfaces web con significado.</span>
            </p>
            <a href="mailto:coelloweb@aol.com" class="outline-none focus:ring-4 focus:ring-monster-200 transition-colors ease-in-out duration-300 text-gray-50 bg-zinc-900 hover:bg-zinc-700 dark:hover:bg-monster-700 dark:bg-monster-600 p-4 text-lg rounded-xl font-semibold"
                > Contrátame
            </a>
        </div>
        <!-- contratame -->

        @if ($lastPost->isEmpty())
            <p class="text-woodsmoke-400 col-span-full text-center text-3xl">
                Aún no hay entradas 🙊
            </p>
        @endif

        <div class="mb-6 lg:col-start-2 lg:row-span-2 lg:flex lg:items-center">
            @foreach ($lastPost as $last)
                <div class="relative h-72 lg:h-96 sm:w-3/4 container mx-auto hover:scale-110 transition ease-in-out duration-300 shadow-2xl rounded-md">
                    <img
                        src="{{ Storage::disk('public')->exists($last->thumbnail) ? Storage::url($last->thumbnail) : asset($last->thumbnail) }}"
                        alt="{{ $last->title }}"
                        class="rounded-md aspect-square object-cover h-full w-full"
                    >
                    <div class="w-full h-full bg-gradient-to-b from-transparent to-black p-4 space-y-2 absolute left-0 bottom-0 flex justify-end flex-col items-start rounded-b-md">
                        <span class="hidden text-sm sm:block rounded-sm px-2 bg-monster-600 text-white">
                            {{ $last->category->name }}
                        </span>
                        <a href="{{ route('posts.show', $last->slug) }}"
                            class="w-auto text-xl font-semibold sm:text-2xl text-white hover:text-monster-500 transition ease-in-out duration-300">
                            {{ $last->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- post 1 sin caption end -->

        <section class="space-y-6">
            @foreach ($recentPosts as $recent)
                <article class="
                    group
                    border
                    sm:border-gray-300
                    dark:border-woodsmoke-800
                    rounded-md
                    bg-white
                    dark:bg-zinc-900
                    p-3
                    flex
                    flex-col-reverse
                    group
                    sm:shadow-lg
                    sm:flex-row
                    sm:w-4/6
                    md:w-auto
                    hover:rotate-3 transition ease-in-out duration-150
                ">
                    <div class="flex flex-col sm:flex-row gap-x-3">

                        <div class="order-1 sm:order-2 flex flex-col">
                            <p class="py-2 order-2">
                                {!! Str::limit($recent->caption, 140, '...') !!}
                            </p>
                            <a
                                class="font-semibold text-xl text-woodsmoke-950 group-hover:text-monster-500 dark:text-monster-300 dark:group-hover:text-monster-400 transition ease-in-out duration-300"
                                href="{{ route('posts.show', $recent->slug) }}"
                            > {{ $recent->title }}
                            </a>
                        </div>

                        <div class="sm:order-1 w-full">
                            <img
                                class="w-auto mb-4 sm:mb-0 rounded-md sm:h-s-233 sm:w-s-377 lg:w-s-233 sm:object-center sm:object-cover"
                                src="{{ Storage::disk('public')->exists($recent->thumbnail) ? Storage::url($recent->thumbnail) : asset($recent->thumbnail) }}"
                                alt="{{ $recent->title }}"
                            >
                        </div>

                    </div>
                </article>
            @endforeach
        </section>
        <!-- 2 posts a la izquierda end -->

        <section class="space-y-6">
            @foreach ($popularPosts as $popular)
                <article class="
                    border
                    sm:border-gray-300
                    dark:border-woodsmoke-800
                    rounded-md
                    bg-white
                    dark:bg-zinc-900
                    p-3
                    flex
                    flex-col-reverse
                    group
                    sm:shadow-lg
                    sm:flex-row
                    sm:w-4/6
                    md:w-auto
                    hover:-rotate-3 transition ease-in-out duration-150
                "
                >
                    <div class="flex flex-col">
                        <p class="order-2 py-2">
                            {!! Str::limit($popular->caption, 140, '...') !!}
                        </p>

                        <a
                            href="{{ route('posts.show', $popular->slug) }}"
                            class="font-semibold text-xl text-woodsmoke-950 group-hover:text-monster-500 dark:text-monster-300 dark:group-hover:text-monster-400 transition ease-in-out duration-300"
                        > {{ $recent->title }}
                        </a>
                    </div>
                    <div class="w-full sm:ml-3">
                        <img
                            class="mb-4 sm:mb-0 rounded-md sm:h-s-233 sm:w-s-377 lg:w-s-233 sm:object-center sm:object-cover"
                            src="{{ Storage::disk('public')->exists($popular->thumbnail) ? Storage::url($popular->thumbnail) : asset($popular->thumbnail) }}"
                            alt="{{ $popular->title }}"
                        >
                    </div>
                </article>
            @endforeach
        </section>
        <!-- 2 posts a la derecha end -->

        <div class="lg:col-start-1 lg:row-start-4 lg:row-span-2 lg:flex lg:items-center">
            @foreach ($secondLast as $secondLatest)
                <div class="relative h-72 lg:h-96 sm:w-3/4 container mx-auto hover:scale-110 transition ease-in-out duration-300 shadow-2xl rounded-md">
                    <img
                        src="{{ Storage::disk('public')->exists($secondLatest->thumbnail) ? Storage::url($secondLatest->thumbnail) : asset($secondLatest->thumbnail) }}"
                        alt="{{ $secondLatest->title }}"
                        class="rounded-md aspect-square object-cover h-full w-full"
                    >
                    <div class="w-full h-full bg-gradient-to-b from-transparent to-black p-4 space-y-2 absolute left-0 bottom-0 flex justify-end flex-col items-start rounded-b-md">
                        <span class="hidden text-sm sm:block rounded-sm px-2 bg-monster-600 text-white">
                            {{ $secondLatest->category->name }}
                        </span>
                        <a
                            href="{{ route('posts.show', $secondLatest->slug) }}"
                            class="w-auto text-xl font-semibold sm:text-2xl text-white hover:text-monster-500 transition ease-in-out duration-300"
                        >
                            {{ $secondLatest->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- post 2 sin caption end -->
    </div>
    <!-- blog posts -->

    <div class="h-s-377 space-y-12 bg-woodsmoke-300 p-4 flex justify-center flex-col items-center">
        <div class="space-y-3 flex justify-center flex-col items-center">
            <h1 class="text-5xl lg:text-6xl font-bold text-woodsmoke-950">
                NEWSLETTER
            </h1>
            <p class="text-smoke text-center sm:text-xl  tracking-wide">
                Muy pronto
            </p>
        </div>
        <x-input-newsletter />
        <x-social-media-icons spacing="horizontal"/>
    </div>
    <!-- ad / service / newsletter -->

    <div class="p-2 space-y-4 max-w-7xl mx-auto lg:px-8 my-16">
        <h1 class="px-2 text-woodsmoke-800 dark:text-woodsmoke-400 tracking-wider text-md">
            MÁS ENTRADAS
        </h1>
        @if ($morePosts->isEmpty())
            <p class="px-2 text-woodsmoke-600 col-span-full text-xl">
                Aquí está vacio 🙊
            </p>
        @endif
        @foreach($morePosts as $post)
            <div class="p-4">
                <div class="flex flex-col justify-between pb-8">
                    <a href="{{ route('posts.show', $post->slug) }}"
                        class="text-2xl pb-4 text-monster-600 hover:underline dark:text-monster-400">
                        {{ $post->title }}
                    </a>
                    <div class="flex items-end space-x-4">
                        <span class="p-1 bg-woodsmoke-600/40 rounded-sm text-white text-sm"
                            >{{ $post->category->name }}
                        </span>
                        <span class="dark:text-gray-400 text-woodsmoke-900 sm:pr-4">
                            {{ $post->getFormattedDate() }}
                        </span>
                    </div>
                </div>
                <p class="text-xl dark:text-woodsmoke-200">
                    {!! Str::limit($post->caption, 160, '...') !!}
                </p>
            </div>
            <hr class="border border-gray-500/30 ">
        @endforeach

    </div>
    <!-- more posts -->
</x-blog-layout>
