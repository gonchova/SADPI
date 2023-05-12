<x-app-layout>

   <div class="flex flex-wrap gap-4 justify-center">
        <div id  = "cardAnimalesIA" class="max-w-sm rounded-lg overflow-hidden shadow-lg   pt-4 mt-4 mx-2 hover:cursor-pointer select-none">
            <div class="bg-orange-500 h-15">
                <img class="w-full h-full" src="{{asset('img/IconoAnimales2.png')}}" alt="Mostrar el animal correcto">
            </div>
            <div class="px-6 py-4 ">
                <div class="font-bold text-xl pb-2 fuenteFichas">Elegir el animal correcto</div>
                <p class="text-gray-700 text-base">
                    El juego se basa en detectar si la ficha del animal qe muestra el niñ/o corresponde al que se solicita. Se utiliza IA para detectar la ficha en vivo.
                </p>
            </div>
            {{-- <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div> --}}
      </div> 

      <div class="max-w-sm  rounded-lg overflow-hidden shadow-lg pt-4 mt-4 mx-2  hover:cursor-pointer select-none">
        <div class="h-15 bg-orange-500">
            <img class="w-full h-full" src="/img/iconoFichas.png" alt="Colocar Fichas">
        </div>
        
        <div class="px-6 py-4">
          <div class="font-bold text-xl pb-2 fuenteFichas">Colocar Fichas</div>
          <p class="text-gray-700 text-base">
            El juegos se basa en colocar la ficha correctamente segun su tipo.
          </p>
        </div>
        {{-- <div class="px-6 pt-4 pb-2">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
        </div> --}}
      </div> 

    </div>

    <script>

        
        document.getElementById("cardAnimalesIA").onclick = function () {
            window.location.href = "{{ route('animalesIA') }}";
            };

    </script>
</x-app-layout>