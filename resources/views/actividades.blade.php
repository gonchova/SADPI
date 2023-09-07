<x-app-layout>
    <div class="flex flex-col max-h-screen">
        <div class="flex bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
            <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Actividades</h2>
        </div>

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

        @if(session('status'))

            <form name="form-elimina-actividad" action="{{route('actividades.eliminar', [ Session::get('idactividad') , 'true'])}}" method="POST">
                @method('DELETE')
                @csrf    
                <!-- Main modal -->
                <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed  top-center left-center right-center z-center  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative mx-auto w-fit  max-h-full border-2 border-gray-500 rounded-lg">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow ">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Eliminación de actividad
                                </h3>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <p class=" text-black">
                                {{ session('status')}}
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex flex-row p-6 space-x-2 border-t border-gray-200 rounded-b justify-center">
                                <x-button name="ConfirmaEliminar" data-modal-hide="defaultModal" type="submit" class="px-2 py-2" >Aceptar</x-button>
                                <x-button name="CancelaEliminar"  data-modal-hide="defaultModal" type="submit" class="px-2 py-2">Cancelar</x-button>
                                <input type="hidden" value="" name="idactividad"/>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </form>
        
        @endif

        <div class="flex-row pt-4 mx-1 sm:mx-2">
            <div class="bg-white shadow-sm sm:rounded-lg pb-2 mx-2">
                <div class="flex-full items-center justify-between pb-4">
                    
                    <form method="GET" action="{{route("actividades.filtrar")}}" >
                        
                        <div class="flex-full inline-flex flex-wrap px-2">   
                            
                            <div  class="mx-2 w-48 shrink flex-wrap">
                                <x-label class=" sm:flex pt-3  text-xs sm:text-sm" for="categoriasFiltro" :value="__('Categorias')" />
                                <select name="categoriasFiltro" id="categoriasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none focus:bg-purple-300 focus:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg  border-gray-600  " >
                                    <option value="" >Todas</option>
                                    @foreach ($especialidades as $esp)
                                        <option value= {{$esp->idespecialidad}} {{(old('categoriasFiltro') == strtolower($esp->descripcion)) ? 'selected' : '' }}> {{$esp->descripcion}} </option>                      
                                    @endforeach
                                </select>
                            </div>                            
                            
                            <div class="mx-2 w-48 shrink flex-wrap">
                                <x-label class="text-xs sm:text-sm sm:flex sm:pl-3 pt-3 " for="buscaActividad" :value="__('Buscar:')" />    
                                <div class="flex flex-row">
                                    <input name = "buscaActividad" id = "buscaActividad" placeholder="Buscar actividad" class="text-xs sm:text-sm focus:outline-none hover:border-purple-300 focus:ring-2 focus:ring-purple-200 mt-2 bg-gray-200 rounded-full  px-3 py-1  font-semibold text-gray-700 mr-2 mb-2  sm:ml-2"> 
                                    <button class="pt-0 h-10 mt-1 " type="submit " > <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            
                        </div>  
                            
                    </form>

                </div>
            </div> 
            {{-- tabla --}}
            
            <div class="bg-white shadow-sm sm:rounded-lg pb-2 mx-2 mt-2">
                <div class="container mx-1 sm:mx-2 ">
            
                    <table class="sm:mx-2 w-full flex sm:inline-table overflow-auto flex-row wrap sm:bg-white rounded-lg  sm:shadow-lg my-4 ">
                        <thead class="text-black ">

                            <tr class=" bg-indigo-200 flex flex-col flex-nowrap whitespace-nowrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-3 text-left">Nombre Actividad</th>
                                <th class="p-3 text-left">Categoria</th>
                                <th class="p-3 text-left" width="110px">Info</th>
                            </tr>
                            @php $cont = 0 @endphp
                            @foreach($actividades as $act)
                                @php
                                    $cont = $cont + 1;
                                @endphp
                                @if ($cont > 1)
                                    
                                    <tr class="sm:hidden bg-indigo-200 flex flex-col flex-nowrap whitespace-nowrap rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                        <th class="p-3 text-left">Nombre Actividad</th>
                                        <th class="p-3 text-left">Categoria</th>
                                        <th class="p-3 text-left" width="110px">Acciones</th>
                                    </tr>
                                    
                                @endif
                            @endforeach

                        </thead>

                        <tbody class="flex-1 sm:flex-none ">
                    
                            @foreach($actividades as $act)
                                
                                <tr class="flex flex-col sm:table-row mb-2 sm:mb-0 max-w-screen mr-2">
                                    
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 md:wrap whitespace-nowrap ">
                                        {{$act->nombre }}
                                    </td>

                                    <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap">
                                        {{((!$act->esp_desc) ? 'Todas' : $act->esp_desc)}}
                                    </td>

                                    <td class="gap-1 border hover:bg-gray-100 p-1 flex-nowrap whitespace-nowrap ">
                                    
                                        <x-button class="px-2 py-2">
                                            <a href="{{route('actividades.editar', $act->idactividad )}}" class="sm:p-2">Editar</a>
                                        </x-button>

                                         <!-- Modal toggle -->

                                        <x-button class="py-2 px-2 bg-red-600"  id="btnEliminar" name="btnEliminar" id-act="{{$act->idactividad}}" data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button">
                                            <a class="btn btn-sm btn-danger" name = "btnEliminartext"  id = "btnEliminartext"  data-bs-toggle="modal" data-bs-target="#ModalEliminacion">Eliminar</a>
                                        </x-button>
                                        
                                        <form name="form-elimina-actividad" action="{{route('actividades.eliminar', ['IDACT', 'false'])}}" method="POST">
                                            @method('DELETE')
                                            @csrf    
                                            <!-- Main modal -->
                                            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-[50%] max-w-2xl max-h-full border-2 border-gray-500 rounded-lg">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow">
                                                        <!-- Modal header -->
                                                        <div class="flex items-start justify-between p-4 border-b rounded-t">
                                                            <h3 class="text-xl font-semibold text-gray-900">
                                                                Eliminación de actividad
                                                            </h3>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-6 space-y-6">
                                                            <p class=" text-black">
                                                                Desea eliminar la actividad seleccionada?
                                                            </p>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="flex flex-row p-6 space-x-2 border-t border-gray-200 rounded-b justify-center">
                                                            <x-button name="ConfirmaEliminar" data-modal-hide="defaultModal" type="submit" class="px-2 py-2" >Aceptar</x-button>
                                                            <x-button data-modal-hide="defaultModal" type="button" class="px-2 py-2">Cancelar</x-button>
                                                            <input type="hidden" name="idactividad"/>
                                                        </div>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    
                                    </td>
                                
                                
                                </tr>
                
                            @endforeach
                
                        </tbody>
  
                    </table>
                
                </div>
            </div>
            
            <div class="flex flex-row mx-4 pb-1">
                <a href="">{{ $actividades->links('vendor.pagination.tailwind') }}</a> 
            </div>
            

        </div>

        <div class="mx-6 my-3 ">
        
                <a href="{{route('actividades.nueva')}}" class="">
                    <x-button class="bg-green-600 px-3 font-medium py-2">
                        Nueva Actividad
                    </x-button>

                </a>
        </div>
       
    </div>

<script>

$(document).ready(function(){  

    $('#categoriasFiltro' ).on('change',function() {
        
        $.get('/actividades/filtrar', function () {

        });
    });


    $('[name=btnEliminar]').click(function(){
        
         var idactividad= $(this).attr('id-act');
         console.log(idactividad);
           
           $("input[name=idactividad]").val(idactividad);
          
           var form = $('[name=form-elimina-actividad]');
           form.attr('action', form.attr('action').replace('IDACT', idactividad));
            
       });

});
    
    
</script>   

</x-app-layout>

