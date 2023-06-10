<x-app-layout>
  
  @if (auth()->user()->idrol == 2)    
    <div class="flex flex-wrap gap-4 justify-center ">

      <div id  = "cardJuegos" class="flex flex-col max-w-sm rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-4 hover:cursor-pointer select-none">
        <div class="flex rounded justify-center" >
          <img class="w-[50%] h-[50%]" src="{{asset('img/Juegos.jpg')}}" alt="Juegos">
        </div>
          <div class="px-6 py-2 block  ">
              <div class="flex font-bold text-xl pb-2 fuenteFichas justify-center">Juegos</div>
              <p class="text-gray-700 text-base">
                  Sección con juegos interactivos para estimular los sentidos y el aprendizaje.
              </p>
          </div>

      </div> 

      <div id  = "cardActividades" class=" flex flex-col max-w-sm rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-4 hover:cursor-pointer select-none ">
        <div class="flex rounded justify-center" >
          <img class="w-[50%] h-[50%]" src="{{asset('img/FamiliaJugando.jpg')}}" alt="Juegos">
        </div>
        
        <div class="px-6 py-2">
          <div class="flex font-bold text-xl pb-2 fuenteFichas rounded justify-center"">Actividades</div>
            <p class="text-gray-700 text-base">
                Sección con actividades guiadas para realizar en familia.
            </p>
          </div>

        </div> 

  </div>

  <script>
        
  document.getElementById("cardJuegos").onclick = function () {
      window.location.href = "{{ route('juegos') }}";
      };

      
  document.getElementById("cardActividades").onclick = function () {
      window.location.href = "{{ route('actividadesFamilia.principal') }}";
      };

  </script>
  @endif
</x-app-layout>
