<div  {{ $attributes->merge(['class' => 'flex flex-col items-center bg-gray-100']) }} >
    
    {{ $logo }}
    
    <div class="mx-10 mt-5 sm:max-w-md  px-6 py-2 bg-white shadow-md overflow-hidden rounded-lg">
        {{ $slot }}
    </div>
</div>
