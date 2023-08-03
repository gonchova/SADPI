<x-app-layout>

   
       
    @if (session('mensaje'))
    <div class="flex flex-row justify-center ">
        <div class="text-green-500" >{{session('mensaje')}}</div>
    </div>
    @endif

    @if(count($errors)>0)
    <div class="flex flex-row justify-center" >
        <ul>          
        @foreach($errors->all() as $err)
            <li class="text-red-600 py-0 my-1" >{{$err}}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <div class="flex flex-wrap justify-center mx-4 ">
    <form method="POST"  id="formulario" action="{{ route('actividadesFamilia.save',$idactividadfamilia)}}">
        @csrf
        <div id  = "cardAnimalesIA" class="flex flex-col rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 hover:cursor-pointer select-none">
            
            <div class="px-6 block py-auto align-middle text-center">
                
                <div class="font-bold text-xl pb-2 fuenteFichas align-middle">{{$actividadFamilia->actividades->nombre}}</div>
                
           </div>
             
            <div class="px-6 pt-4 pb-2 mt-auto">
                <x-label>
                    <div>Realización de la actividad:</div>
                </x-label>
                <div class="mt-2 bg-gray-600 rounded-md text-start">
                    
                    <h1 class="text-start mx-2">{{$actividadFamilia->actividades->descripcion}}
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
                        
                        @foreach($pasosActividad as $paso) 
                            <tbody>
                            
                                <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                                    <td scope="row" class="border  px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                        {{$paso->idpaso}}
                                    </td>
    
                                    <td scope="row" class="border px-2 py-2 font-small italic text-black ">
                                        {{$paso->descripcion}}
                                    </td>
                                </tr>
                                
                            </tbody>
                         @endforeach
                    </table>
                   
                </div>

                <x-label class="mt-4 mb-2">
                    <div>Observaciones durante la actividad:</div>
                </x-label>
                <textarea name ="observaciones"  rows='1' placeholder=''></textarea>

                <div class="flex flex-row mt-2 justify-center">
                    <div class="flex flex-col m-2 justify-center w-auto">
                        <x-button type="submit"  class="my-2 px-1 mx-auto" id="btnActividadRealizada">
                            Actividad del día realizada
                        </x-button>
                                                       
                        <a href="{{ route('actividadesFamilia.principal') }}" class="mx-auto">
                            <x-button class="px-2" type="button" >
                                {{ __('Salir') }}
                            </x-button>  
                        </a>
                    </div>
                </div>
                
            </div>
        </div> 

    </form>

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