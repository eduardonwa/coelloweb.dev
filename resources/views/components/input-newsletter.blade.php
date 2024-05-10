@props([
    'format' => 'regular',
    'inputClasses' => 'p-3 block w-full rounded-lg bg-woodsmoke-200 hover:bg-woodsmoke-100 dark:text-woodsmoke-800 focus:ring-monster-500 dark:focus:ring-monster-500 focus:border-monster-500 dark:focus:border-monster-500 dark:placeholder-gray-400',
    'buttonClasses' => 'end-0 top-0 uppercase text-monster-50 text-sm bg-woodsmoke-400 hover:bg-monster-600 focus:ring-4 focus:outline-none focus:ring-monster-300 rounded-r-lg dark:bg-smoke dark:hover:bg-monster-600 dark:focus:ring-monster-800'
])

@php
    switch($format) {
        case 'minimal':
            $inputClasses = 'p-3 text-gray-100 bg-smoke border-gray-500 rounded-r-none hover:placeholder-woodsmoke-400 placeholder-woodsmoke-200 rounded-md focus:ring-woodsmoke-500 dark:focus:ring-woodsmoke-500 focus:border-woodsmoke-500 dark:focus:border-woodsmoke-500';
            $buttonClasses = 'bg-woodsmoke-200 text-sm text-smoke2 rounded-r-md';
            break;
    }
@endphp

<form class="w-full sm:w-s-610 lg:w-s-610">
    <label
        for="submitNewsletter"
        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
        > Email
    </label>

    <div class="relative">
        <div class="text-gray-600 dark:text-woodsmoke-600 absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
        </div>
        <input
            type="email"
            id="submitNewsletter"
            class="ps-9 text-sm md:text-base border border-gray-300 outline-none focus:ring-2 dark:border-gray-600 transition-colors ease-in-out duration-300 {{ $inputClasses }}"
            placeholder="Email"
            required />
        <button
            type="submit"
            class="absolute px-2 sm:px-4 h-full transition-colors ease-in-out duration-300 {{ $buttonClasses }}"
                > Suscríbete
        </button>
    </div>
</form>
