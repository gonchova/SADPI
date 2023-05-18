<x-app-layout>

   <div class="flex flex-wrap gap-4 justify-left ml-10  mr-5">
       
        <div id  = "cardActividad1" class="flex flex-col max-w-60 w-60 rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-2 hover:cursor-pointer select-none">
  
            <div class="px-6 py-2 block ">
                <div class="font-bold text-xl pb-2 fuenteFichas">Reconocer las letras de su nombre</div>

           </div>
             
            <div class="px-6 pt-4 pb-2 mt-auto">
                <x-label>
                    <div>Avance de la Actividad:</div>
                </x-label>
                <div class="mt-2 bg-gray-600 rounded-full">
                    <div class="w-2/12 mt-2 bg-purple-900 py-1 text-center rounded-full"><div class="text-white text-sm inline-block bg-purple-700  rounded-full">10%</div></div>
                </div>
            </div>
        </div> 

        <div id  = "cardAnimales2" class="flex flex-col  max-w-60 w-60 rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-2 hover:cursor-pointer select-none">
  
            <div class="px-6 py-2 block ">
                <div class="font-bold text-xl pb-2 fuenteFichas">Leer un cuento en familia</div>

           </div>
             
            <div class="px-6 pt-4 pb-2 mt-auto">
                <x-label>
                    <div>Avance de la Actividad:</div>
                </x-label>
                <div class="mt-2 bg-gray-600 rounded-full">
                    <div class="w-12/12 mt-2 bg-green-600 py-1 text-center rounded-full"><div class="text-white text-sm inline-block  rounded-full">100%</div></div>
                </div>
            </div>
        </div> 

        
        <div id  = "cardAnimales2" class="flex flex-col  max-w-60 w-60 rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-2 hover:cursor-pointer select-none">
  
            <div class="px-6 py-2 block ">
                <div class="font-bold text-xl pb-2 fuenteFichas">Reconocer colores</div>

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

        <div id  = "cardAnimales2" class="flex flex-col  max-w-60 w-60 rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-2 hover:cursor-pointer select-none">
  
            <div class="px-6 py-2 block ">
                <div class="font-bold text-xl pb-2 fuenteFichas">Reconocer partes del cuerpo</div>

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

    </div>

    <script>

        
        document.getElementById("cardActividad1").onclick = function () {
            window.location.href = "{{ route('actividadesFamilia.actividadFamilia') }}";
            };

            
        document.getElementById("cardFichas").onclick = function () {
            window.location.href = "{{ route('colocarFicha') }}";
            };

    </script>
</x-app-layout>