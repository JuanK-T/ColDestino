@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-3 text-base font-medium leading-5 bg-gray-400 text-white focus:outline-none focus:border-indigo-700 transition'
            : 'inline-flex items-center px-3 py-3 text-base font-medium leading-5 text-gray-700 hover:text-gray-700 hover:bg-gray-200 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
