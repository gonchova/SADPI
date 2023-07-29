<x-app-layout>
   
    <div class="flex  flex-row bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        <h2 class="text-gray-700 uppercase antialiased  font-bold text-sm">Comentarios de la Familia</h2>
    </div>

    <div class="flex flex-row flex-wrap mx-2 bg-white shadow-sm rounded-lg mt-2 mb-2 justify-between ">   
       
        <div class="text-gray-700 uppercase antialiased font-bold  text-sm ">
            <div class="flex flex-row">
                <x-label class="pt-2 mt-1 mx-1" for="name" :value="__('Familia:')" />
                <x-input id="nombre" class="pl-3 pt-3 " type="label" name="nombre" :value="old('nombre')"  disabled value="{{$nombreFamilia->name}}" />
                
            </div>
        </div>
        <div class="text-gray-700 uppercase antialiased  font-bold text-sm bg-white">
            <div class="flex flex-row">
                <x-label class="pt-2 mt-1  mx-1" for="periodo" :value="__('Período:')" />
                <x-input id="periodoD" class="w-20 pt-3  " type="label" name="periodo"  disabled value="{{$actividadFamilia->fecdesde}}" />
                  <x-label class="pt-2 mt-1  mx-1 lowercase"  value=" al " />
                <x-input id="periodoH" class="w-20 pt-3  " type="label" name="periodo"  disabled value="{{$actividadFamilia->fechasta}}" />
            </div>
        </div>

        <div class="text-gray-700 uppercase antialiased  font-bold text-sm">
            <div class="flex flex-row">
                <x-label class="pt-2 mt-1  mx-1" for="periodo" :value="__('Actividad:')" />
                <x-input id="actividad" class="pl-3 pt-3 " type="label" name="actividad"  disabled value="{{$actividadFamilia->actividades->nombre}}" />
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between pb-4">

        <table class="w-auto text-sm text-left text-gray-500 border-solid mx-2 border-collapse  w-full">
            <thead class="text-xs text-gray-700 uppercase bg-indigo-200 sm:text-sm ">
                <tr>
                    <th scope="col" class="border w-10 px-1 py-2 text-xs sm:text-sm sm:whitespace-nowrap">
                        Nro Intento
                    </th>
                    <th scope="col" class="border px-1 py-2 h-2 text-xs sm:text-sm">
                        Comentario
                    </th>
                </tr>
            </thead>
           
            <tbody>

               @foreach ($comentarios as $com)
                    <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm ">
                        
                        <td scope="row" class="border px-6 py-2 font-medium  text-black ">
                           {{$com->idnumerodia}}
                        </td>
                    
                        <td scope="row" class=" border px-4 py-2 font-medium italic text-black">
                            <p class="flex flex-col text-justify text-wrap " > {{$com->comentario}} </p>
                        </td>
                        
                    </tr>

                @endforeach
            </tbody>
      
        </table>
    </div>

    <div class="flex items-center justify-left ml-2">
        <a  onclick="window.history.back();" >
            <x-button type="button" id="btnVolver" class="px-2">
                {{ __('Volver') }}
            </x-button>
        </a>
    </div>

</x-app-layout>
<script>

</script>
