<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actividades') }}
        </h2>
    </x-slot> --}}

    <!-- Main -->
    <div class="row justify-content-center ">
        @if (session('mensaje'))
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif
    
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $err)
                    <li class="alert alert-danger">{{ $err }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="flex bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Actividades</h2>
{{--         
        @foreach($actividades as $act)
            <x-label>aaaa: {{$ac->descripcion}}</x-label>
        @endforeach --}}
    </div>

        <div class="flex-row pt-4 mx-2">

            <div class="shadow-md sm:rounded-lg  ">
            
                <div class="flex-full items-center justify-between pb-4">
                    
                    <form method="GET" action="{{route("actividades.filtrar")}}" >
                        
                        <div class="flex-full inline-flex flex-wrap px-2">   
                            
                            <div  class="mx-2 w-48 shrink flex-wrap">
                                <x-label class=" sm:flex pt-3  text-xs sm:text-sm" for="categoriasFiltro" :value="__('Categorias')" />
                                <select name="categoriasFiltro" id="categoriasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg  border-gray-600  " >
                                    <option value="" >Todas</option>
                                    @foreach ($especialidades as $esp)
                                        <option value= {{$esp->idespecialidad}} {{(old('categoriasFiltro') == strtolower($esp->descripcion)) ? 'selected' : '' }}> {{$esp->descripcion}} </option>                      
                                    @endforeach
                                </select>
                            </div>                            

                            <div>
                                <x-label class="text-xs sm:text-sm  sm:flex ml-4 pl-4 pt-3 " for="buscaActividad" :value="__('Buscar:')" />
                                <input name = "buscaActividad" id = "buscaActividad" placeholder="Buscar actividad" class="text-xs sm:text-sm focus:outline-none hover:border-purple-300 focus:ring-2 focus:ring-purple-200 mt-2 bg-gray-200 rounded-full flex px-3 py-1  font-semibold text-gray-700 mr-2 mb-2 ml-2"> 
                            </div>
                            
                            <div>
                                <button class="pt-0 h-10 mt-1" type="submit" > <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>  
                            
                    </form>

                </div>

                {{-- tabla --}}
                <body class="flex items-center justify-center ">
	            <div class="container mx-1 sm:mx-2 ">
                    
                    <table class="sm:mx-2 w-full flex sm:inline-table overflow-auto flex-row flex-nowrap sm:bg-white rounded-lg  sm:shadow-lg my-5 ">
                        <thead class="text-black ">

                            <tr class=" bg-indigo-200 flex flex-col flex-nowrap whitespace-nowrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-3 text-left">Nombre Actividad</th>
                                <th class="p-3 text-left">Categoria</th>
                                <th class="p-3 text-left" width="110px">Acciones</th>
                            </tr>

                            <tr class="sm:hidden bg-indigo-200 flex flex-col flex-nowrap whitespace-nowrap rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-3 text-left">Nombre Actividad</th>
                                <th class="p-3 text-left">Categoria</th>
                                <th class="p-3 text-left" width="110px">Acciones</th>
                            </tr>
                        </thead>

                        <form method="GET" >
                        <tbody class="flex-1 sm:flex-none">
                      
                            @foreach($actividades as $act)
                                {{-- <label>aaaa: {{$act}}</label> --}}
                                <tr class="flex flex-col sm:table-row mb-2 sm:mb-0 w-fit">
                                    
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap">
                                        {{$act->descripcion}}
                                    </td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap">
                                        {{$act->esp_desc}}
                                    </td>

                                    <td class="gap-1  border hover:bg-gray-100 p-1.5 flex-nowrap whitespace-nowrap ">
                                    
                                        <x-button class="px-2">
                                            <a href="{{route('actividades.editar')}}" class=" sm:p-2">Editar</a>
                                        </x-button>

                                        <x-button class="px-2 bg-red-600"  id="btnEliminar">
                                            <a href="#" class="px-0  text-xs">Eliminar</a>
                                        </x-button>
                                    </td>
                                
                                </tr>
                            @endforeach
                          
                        </tbody>
                    </form>
                    </table>
                </div>
                </div>
            </div>
            <div class="mx-6 my-3">
                <x-button class="bg-green-600 px-4">
                    <a href="{{route('actividades.nueva')}}" class="font-medium ">Nueva Actividad</a>
                </x-button>
            </div>
            
        </div> 
    </div> <!-- fin flex-row -->

<script>

$(document).ready(function(){  
    

    $('#categoriasFiltro' ).on('change',function() {
        
        $.get('/actividades/filtrar', function () {

        });
    });
    // const genderOldValue = '{{ old('gender') }}';
    
    // if(genderOldValue !== '') {
    //   $('#gender').val(genderOldValue);
    // }
    
    // //cargo combo categorias
    // $.get('/getEspecialidades', function (especialidades) {
    //     $.each(especialidades,function(id, valor){
    // 		$("#categoriasFiltro").append("<option value="+valor.idespecialidad+" "+ "{{old('categoriasFiltro') == '+ valor.idespecialidad +' ? 'selected' : '' }}"+">"+valor.descripcion+"</option>");
            
    //       //  $("#categoriasFiltro option[value='2']").attr("selected", true);
    //      //   $('#categoriasFiltro option[value=valor.idespecialidad]').prop('selected', 'selected').change();
            
          
    //     })



    // });



});
    
    
</script>   

</x-app-layout>

