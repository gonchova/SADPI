<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actividades') }}
        </h2>
    </x-slot>

    @php
        $id = 4;
    @endphp
    <!-- Main -->
    <div class="flex flex-row">
        
        <div class="basis-1/2 w-auto mx-auto px-6 mt-4 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="px-4 py-2">
                    <x-item-actividad :iditem="$id">
                    
                        <x-slot name="tituloitem">
                            Escondidas
                        </x-slot>

                        <x-slot name="content">
                            La actividad consta de jugar con el niño/a a las escondidas de modo de promover el movimiento
                        </x-slot>
                    
                    </x-item-actividad>
                </div>
                
                <div class="px-6 pt-4 pb-2">
                    <label for="cantDias">Dias</label>
                    <input id = "cantDias" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                </div>
                
            </div>
        </div>
        <div class="basis-1/2 w-auto mx-auto px-6 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="px-6 py-4">
                    <x-item-actividad :iditem="$id">
                    
                        <x-slot name="tituloitem">
                            Escondidas
                        </x-slot>

                        <x-slot name="content">
                            La actividad consta de jugar con el niño/a a las escondidas de modo de promover el movimiento
                        </x-slot>
                    
                    </x-item-actividad>
                </div>
                
                <div class="px-6 pt-4 pb-2">
                    <label for="cantDias">Dias</label>
                    <input id = "cantDias" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                </div>
                                
                <div class="px-6 pt-4 pb-2">
                    <label for="cantDias">Dias</label>
                    <input id = "cantDias" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                </div>
                
            </div>
        </div>
    </div> <!-- fin flex-row -->


</x-app-layout>

