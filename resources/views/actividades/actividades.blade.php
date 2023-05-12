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


    <div class="bg-white shadow-sm sm:rounded-lg pb-4 ">

    <div class="flex-row pt-4 mx-4 ">
        
        <div class="shadow-md sm:rounded-lg ">
           
            <div class="flex-full items-center justify-between pb-4">
                
                <form method="GET" >
                    <div class="flex-full inline-flex flex-wrap px-4">   

                        <x-label class="hidden sm:flex pt-3 pb-2 text-xs sm:text-sm" for="categoriasFiltro" :value="__('Categorias')" />
                        
                        <div  class="mx-2 w-48 shrink">
                            <select name="categoriasFiltro" id="categoriasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm bg-gray-800  border-gray-600  " >
                                <option value="">Todas</option>
                                <option value="">Autismo</option>
                                
                            </select>
                        </div>                            

                        <x-label class="text-xs sm:text-sm hidden sm:flex ml-4 pl-4 pt-3 pb-2" for="buscaActividad" :value="__('Buscar:')" />

                        <div>
                            <input id = "buscaActividad" placeholder="Buscar" class="text-xs sm:text-sm focus:outline-none hover:border-purple-300 focus:ring-2 focus:ring-purple-200 mt-2 bg-gray-200 rounded-full flex px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 ml-2"> 
                        </div>
                        <div>
                            <button class="pt-1 h-10 mt-1" type="submit" > <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>  
                        
                </form>

            </div>

            <div class="flex items-center justify-between pb-4 ">

                <table class="w-full text-sm text-left text-gray-500 border-solid mx-2 border-collapse ">
                    <thead class=" text-xs text-gray-700 uppercase bg-indigo-200 text-xs sm:text-sm ">
                        <tr>
                            <th scope="col" class="border px-6 py-2 text-xs sm:text-sm">
                                Nombre Actividad
                            </th>
                            <th scope="col" class="border px-6 py-2 h-2 text-xs sm:text-sm">
                                Categoria
                            </th>
                            <th scope="col" class="border px-6 py-2 text-xs sm:text-sm">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                            <form method="GET" >
                                <td scope="row" class="border  px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                    Saltar la cuerda
                                </td>
                                <td scope="row" class=" border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                    Sindrome de Down
                                </td>
                                <td class="px-6 py-2 border ">
                                
                                        <x-button>
                                            <a href="#" class="font-medium ">Editar</a>
                                        </x-button>
                                </td>
                            </form>
                        </tr>

                        <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                            <form method="GET" >
                                <td scope="row" class="border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                    Jugar a las escondidas
                                </td>
                                <td scope="row" class="border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                    Autismo
                                </td>
                                <td class="border px-6 py-2">
                                
                                        <x-button>
                                            <a href="#" class="font-medium ">Editar</a>
                                        </x-button>
                                </td>
                            </form>
                        </tr>
                        
                    </tbody>
                </table>
               
            </div>
        </div>
        <div class="mx-6 my-3">
            <x-button class="bg-green-600 ">
                <a href="{{route('actividades.nueva')}}" class="font-medium ">Nueva Actividad</a>
            </x-button>
        </div>
    </div> 
    </div> <!-- fin flex-row -->

</div>

{{-- <h2 class="mb-2 text-lg font-semibold text-gray-900 ">Password requirements:</h2>
<ul class="max-w-md space-y-1 text-gray-500 list-inside ">
    <li class="flex items-center">
        <svg class="w-4 h-4 mr-1.5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        At least 10 characters
    </li>
    <li class="flex items-center">
        <svg class="w-4 h-4 mr-1.5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        At least one lowercase character
    </li>
    <li class="flex items-center">
        <svg class="w-4 h-4 mr-1.5 text-red-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
        At least one special character, e.g., ! @ # ?
    </li>
</ul> --}}
<script>

</script>

</x-app-layout>

