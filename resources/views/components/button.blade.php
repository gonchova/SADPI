@props([
    'type' => 'submit'
])

<button type='{{ $type }}'  {{ $attributes->merge(['class' => 'items-center  py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:bg-purple-300 focus:text-black active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
