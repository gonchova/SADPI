<x-app-layout>

   <div class="flex flex-wrap justify-left mx-4 ">
       
        <div id  = "cardAnimalesIA" class="flex flex-col rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 hover:cursor-pointer select-none">
  
            <div class="px-6 block py-auto align-middle text-center">
                <div class="font-bold text-xl pb-2 fuenteFichas align-middle">Reconocer las letras de su nombre</div>

           </div>
             
            <div class="px-6 pt-4 pb-2 mt-auto">
                <x-label>
                    <div>Realización de la actividad:</div>
                </x-label>
                <div class="mt-2 bg-gray-600 rounded-md text-start">
                    
                    <h1 class="text-start mx-2">La realizacion de la actividad implica que el adulto que acompañe al niño/a a conocer y descubrir las letras de su nombre. El objetivo 
                        de la actividad es que el niño/a seleccione las letras que pertenecen a su nombre. 
                    </h1>
                </div>

                <x-label class="mt-2">
                    <div>Pasos para la realización de la actividad:</div>
                </x-label>

                <div class="flex items-center justify-between pb-4 pt-4 px-4">
                    <table class=" min-w-full text-sm text-left text-gray-500 border-solid border-collapse">
                        <thead class=" text-gray-700 uppercase bg-indigo-200 text-xs sm:text-sm ">
                            <tr>
                                <th scope="col" class="border px-2 py-2 text-xs sm:text-sm w-4">
                                    Nro. Paso
                                </th>
                                <th scope="col" class="border px-2 py-2 h-2 text-xs sm:text-sm">
                                    Descripcion
                                </th>
                                
                            </tr>
                        </thead>
                     
                        <tbody>
                           
                            <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                                   <td scope="row" class="border  px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                        1
                                    </td>
    
                                    <td scope="row" class=" border px-2 py-2 font-small italic text-black">
                                        Escriba en diferentes hojas de papel, no necesariamente muy grandes, las letras de su nombre y ademas otras letras que no 
                                        estan en el nombre del niño/a. Puede pintarlas de colores, imprimirlas o manuscritas.
                                    </td>
                                 
                                             
                            </tr>
                             
                            <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                               
                                    <td scope="row" class="border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                       2
                                    </td>
                                    <td scope="row" class="border w-100 px-2 py-2 font-small italic text-black">
                                        Invitar al niño/a a jugar en un espacio libre de distracciones.
                                    </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                               
                                <td scope="row" class="border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                   3
                                </td>
                                <td scope="row" class="border w-100 px-2 py-2 font-small italic text-black">
                                    Disponer las letras sobre la mesa, inicialmente ordenadas como corresponde para que el niño/a por deducción observe como se ve su nombre.
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                               
                                <td scope="row" class="border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                   4
                                </td>
                                <td scope="row" class="border w-100 px-2 py-2 font-small italic text-black">
                                    Alentar al niño/a y guiarlo para que selecione correctamente las letras que pertenecen a su nombre.
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                               
                                <td scope="row" class="border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                   5
                                </td>
                                <td scope="row" class="border w-100 px-2 py-2 font-small italic text-black">
                                    No presionarlo en caso de equivocarse, es un preoceso gradual. Instarlo con alegría a que vuelta a intentarlo.
                                </td>
                            </tr>

                            <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                               
                                <td scope="row" class="border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                   6
                                </td>
                                <td scope="row" class="border w-100 px-2 py-2 font-small italic text-black">
                                   Adicionalmente, si el niño/a ya reconoce las letras de su nombre, puede desafiarlo a colocarlas correctamente.
                                </td>
                            </tr>
                        </tbody>
              
                    </table>
                   
                </div>

                <x-label class="mt-4 mb-2">
                    <div>Observaciones durante la actividad:</div>
                </x-label>
                <textarea   rows='1' placeholder=''></textarea>

                <div class="flex flex-row mt-2 justify-center">
                    <div class="flex flex-col m-2 justify-center w-auto">
                        <x-button class="my-2 px-1 mx-auto">
                            Actividad del día realizada
                        </x-button>
                                                       
                        <a href="{{ route('principal') }}" class="mx-auto">
                            <x-button class="px-2">
                                {{ __('Salir') }}
                            </x-button>  
                        </a>
                    </div>
                </div>
                
            </div>
        </div> 

       

    </div>

    <script>
var textarea = document.querySelector('textarea');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}
    </script>
</x-app-layout>