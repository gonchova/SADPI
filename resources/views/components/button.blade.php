@props([
    'type' => 'submit',
    'value' => ''
])

<button type='{{ $type }}'  {{ $attributes->merge(['class' => ' items-center bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                focus:text-gray-200 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 active:bg-purple-300  disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
