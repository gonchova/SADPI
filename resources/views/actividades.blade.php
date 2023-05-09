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

    <div class="bg-white shadow-sm sm:rounded-lg mt-2 mb-2">
        
        <Label>Actividades</Label>
   
    </div>


    <div class="bg-white shadow-sm sm:rounded-lg mt-4 pb-4">

    <div class="flex-row pt-4 mx-4 ">
        
        <div class="shadow-md sm:rounded-lg">
           
            <div class="flex-full items-center justify-between pb-4">
                
                <form method="GET" >
                    <div class="flex-full inline-flex flex-wrap px-4">   
                       
                        <div  class="mx-2 w-48 shrink">
                            <select name="categoriasFiltro" id="categoriasFiltro" class="inline-flex items-center px-3 w-full text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600 hover:bg-purple-500 " >

                                <option value="" >Categoria</option>
                                <option value="">Autistas</option>
                            </select>
                        </div>                            


                        <div id = "lblBuscar" class="hidden sm:flex ml-4 pl-4 pt-2 pb-2">
                            <label   for="buscaActividad">Buscar</label>
                        </div>
                        <div>
                            <input id = "buscaActividad" class="mt-2 bg-gray-200 rounded-full flex px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 ml-2"> 
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

            <div class="flex items-center justify-between pb-4">

                <table class="w-full text-sm text-left text-gray-500 border-solid mx-2 ">
                    <thead class="text-xs text-gray-700 uppercase bg-indigo-200 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre Actividad
                            </th>
                            <th scope="col" class="px-6 py-3 h-2">
                                Categoria
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <form method="GET" >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    Saltar la cuerda
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    Sindrome de Down
                                </th>
                                <td class="px-6 py-4">
                                
                                        <x-button>
                                            <a href="#" class="font-medium text-blue-600 ">Editar</a>
                                        </x-button>
                                </td>
                            </form>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    </div> <!-- fin flex-row -->
    
</div>

<h2 class="mb-2 text-lg font-semibold text-gray-900 ">Password requirements:</h2>
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
</ul>
<script>
    const lblBuscar = document.querySelector('#lblBuscar');




</script>

</x-app-layout>

