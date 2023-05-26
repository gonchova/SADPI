<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actividades') }}
        </h2>
    </x-slot> --}}

    @php
        $id = 4;
    @endphp
    <!-- Main -->

    <div class="flex bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Actividades</h2>
   
    </div>



        <div class="flex-row pt-4 mx-2">
            
            <div class="shadow-md sm:rounded-lg  ">
            
                <div class="flex-full items-center justify-between pb-4">
                    
                    <form method="GET" >
                        <div class="flex-full inline-flex flex-wrap px-2">   

                            <x-label class="hidden sm:flex pt-3 pb-2 text-xs sm:text-sm" for="categoriasFiltro" :value="__('Categorias')" />
                            
                            <div  class="mx-2 w-48 shrink flex-wrap">
                                <select name="categoriasFiltro" id="categoriasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg  border-gray-600  " >
                                    <option value="">Todas</option>
                                    <option value="">Autismo</option>
                                    
                                </select>
                            </div>                            

                            <x-label class="text-xs sm:text-sm hidden sm:flex ml-4 pl-4 pt-3 pb-2" for="buscaActividad" :value="__('Buscar:')" />

                            <div>
                                <input id = "buscaActividad" placeholder="Buscar" class="text-xs sm:text-sm focus:outline-none hover:border-purple-300 focus:ring-2 focus:ring-purple-200 mt-2 bg-gray-200 rounded-full flex px-3 py-1  font-semibold text-gray-700 mr-2 mb-2 ml-2"> 
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
                    
                    <table class="sm:mx-2 w-full flex sm:inline-table  overflow-auto flex-row flex-nowrap sm:bg-white rounded-lg  sm:shadow-lg my-5 ">
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
                        <tbody class="flex-1 sm:flex-none ">
                            <tr class="flex flex-col sm:table-row mb-2 sm:mb-0 w-fit">
                                
                                <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap">
                                        Saltar la cuerda
                                </td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap">
                                        Sindrome de Down
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

                            <tr class="flex flex-col sm:table-row mb-2 sm:mb-0  w-fit">
                                <form method="GET" >
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap">
                                        Jugar a las escondidas
                                    </td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap">
                                        Autismo
                                    </td>
                                    <td class="sm:inline-flex gap-1 border hover:bg-gray-100 p-1.5 flex-nowrap">
                                    
                                            <x-button class="px-2">
                                                <a href="{{route('actividades.editar')}}" class="text-xs sm:p-2">Editar</a>
                                            </x-button>
                                            <x-button class="px-2 bg-red-600  " id="btnEliminar">
                                                <a href="#" class="font-medium">Eliminar</a>
                                            </x-button>
                                    </td>
                            
                            </tr>
                            
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
    
    <style>

        /* @media (min-width: 640px) {
          table {
            display: inline-table !important;
          } */
      
          /* thead tr:not(:first-child) {
            display: none;
          }
        } */
      
        td:not(:last-child) {
          border-bottom: 0;
        }
      
        th:not(:last-child) {
          border-bottom: 2px solid rgba(0, 0, 0, .1);
        }
      </style>
</x-app-layout>

