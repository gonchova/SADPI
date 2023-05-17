
@props(['align' => 'center', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])
@php

$classes = ($active ?? false)
            ? 'flex flex-col  items-center absolute px-2 my-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2 transition duration-150 ease-in-out bg-indigo-300'
            : 'flex  flex-col items-center absolute px-2 my-3 text-gray-300 hover:bg-gray-900 hover:text-white rounded-md text-sm font-medium uppercase leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 hover:bg-indigo-300 transition duration-150 ease-in-out';
            
@endphp



<div {{ $attributes->merge(['class' => $classes]) }}  x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        {{ $attributes->merge(['class' => $classes]) }} 
        style="display: none;"
        @click="open = false">
<div class="relative rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
    {{ $content }}
</div>
</div>
</div>