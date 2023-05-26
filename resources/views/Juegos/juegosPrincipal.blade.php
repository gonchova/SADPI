<x-app-layout>

   <div class="flex flex-wrap gap-4 justify-center ">
        <div id  = "cardAnimalesIA" class="flex flex-col max-w-sm rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-2 hover:cursor-pointer select-none">
            <div class="bg-orange-500 h-15 rounded">
                <img class="w-full h-full" src="{{asset('img/IconoAnimales2.png')}}" alt="Mostrar el animal correcto">
            </div>
            <div class="px-6 py-2 block ">
                <div class="font-bold text-xl pb-2 fuenteFichas">Elegir el animal correcto</div>
                <p class="text-gray-700 text-base">
                    El juego se basa en detectar si la ficha del animal que muestra el niña/o corresponde al que se solicita. Se utiliza IA para detectar la ficha en vivo.
                </p>
            </div>
             
            <div class="px-6 pt-4 pb-2 mt-auto">
                <x-label>
                    <div>Avance de la Actividad:</div>
                </x-label>
                <div class="mt-2 bg-gray-600 rounded-full">
                    <div class="w-8/12 mt-2 bg-purple-900 py-1 text-center rounded-full"><div class="text-white text-sm inline-block bg-purple-700  rounded-full">75%</div></div>
                </div>
            </div>
        </div> 

        <div id  = "cardFichas" class=" flex flex-col max-w-sm rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-2 hover:cursor-pointer select-none ">
            <div class="h-15">
                <img class="w-full h-full" src="/img/iconoFichasv1.png" alt="Colocar Fichas">
            </div>
            
            <div class="px-6 py-2">
            <div class="font-bold text-xl pb-2 fuenteFichas rounded">Colocar Fichas</div>
            <p class="text-gray-700 text-base">
                El juego se basa en colocar la ficha correctamente según su tipo.
            </p>
            </div>

            <div class="px-6 pt-4 pb-2 mt-auto">
                <x-label>
                    <div>Avance de la Actividad:</div>
                </x-label>
                <div class="mt-2 bg-gray-600 rounded-full">
                    <div class="w-3/12 mt-2 bg-purple-900 py-1 text-center rounded-full"><div class="text-white text-sm inline-block bg-purple-700  rounded-full">35%</div></div>
                </div>
            </div>

        </div> 

    </div>

    <script>

        
        document.getElementById("cardAnimalesIA").onclick = function () {
            window.location.href = "{{ route('animalesIA') }}";
            };

            
        document.getElementById("cardFichas").onclick = function () {
            window.location.href = "{{ route('colocarFicha') }}";
            };

    </script>
</x-app-layout>