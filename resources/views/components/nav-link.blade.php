@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-2 my-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2 transition duration-150 ease-in-out bg-indigo-300'
            : 'flex items-center px-2 my-3 text-gray-300 hover:bg-gray-900 hover:text-white rounded-md text-sm font-medium uppercase leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 hover:bg-indigo-300 transition duration-150 ease-in-out';
@endphp




<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>