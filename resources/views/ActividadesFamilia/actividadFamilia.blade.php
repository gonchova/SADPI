<x-app-layout>

   <div class="flex flex-wrap justify-left ml-10 mr-4">
       
        <div id  = "cardAnimalesIA" class="flex flex-col rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 hover:cursor-pointer select-none">
  
            <div class="px-6 block py-auto align-middle text-center">
                <div class="font-bold text-xl pb-2 fuenteFichas align-middle">Reconocer las letras de su nombre</div>

           </div>
             
            <div class="px-6 pt-4 pb-2 mt-auto">
                <x-label>
                    <div>Realización de la actividad:</div>
                </x-label>
                <div class="mt-2 bg-gray-600 rounded-md text-start">
                    
                    <h1 class="text-start mx-2">La realizacion de la actividad implica que el adulto que acompañe al niño/a escriba en diferentes hojas de papel, no necesariamente muy grandes,
                        las letras de su nombre y ademas otras letras que no estan en el nombre del niño/a. Puede pintarlas de colores, imprimirlas o manuscritas.
                        Luego dispone todas las letras sobre la mesa y el objetivo de la actividad es que el niño seleccione las letras que pertenecen a su nombre. Adicionalmente 
                        puede instarlo a colocarlas en el orden correcto.
                    </h1>
                </div>

                <x-label class="mt-4 mb-2">
                    <div>Observaciones durante la actividad:</div>
                </x-label>
                <textarea   rows='1' placeholder=''></textarea>

                <div class="flex flex-row mt-2 justify-center">
                    <x-button>
                        Actividad del día realizada
                    </x-button>
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