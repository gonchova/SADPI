<div  {{ $attributes->merge(['class' => 'min-h-screen flex flex-col items-center bg-gray-100']) }} >
    
    <div>
        {{ $logo }}
    </div>
    
    <div class="mx-10 mt-5 sm:max-w-md  px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
        {{ $slot }}
    </div>
</div>
