@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-monster-400 dark:border-monster-600 text-base font-semibold leading-5 text-monster-700 dark:text-monster-400 focus:outline-none focus:border-monster-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-smoke dark:text-woodsmoke-300 hover:text-monster-700 dark:hover:text-monster-300 hover:border-gray-300 dark:hover:border-monster-700 focus:outline-none focus:text-monster-700 dark:focus:text-monster-300 focus:border-monster-300 dark:focus:border-monster-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
