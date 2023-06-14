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
        
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Dashboard</h2>
   
    </div>


    <div class="bg-white shadow-sm sm:rounded-lg pb-4 ">

    <div class="flex-row pt-4 mx-4 ">
        
        <div class="shadow-md sm:rounded-lg ">
           
            <div class="flex-full items-center justify-between pb-4">
                
                <form method="GET" >
                    <div class="flex-full inline-flex flex-wrap px-4">   

                       
                        
                        <div  class="mx-2 w-48 shrink flex-wrap">
                            <x-label class="sm:flex pt-3  text-xs sm:text-sm" for="categoriasFiltro" :value="__('Familia:')" />
                            <select name="categoriasFiltro" id="categoriasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg border-gray-600  " >
                                <option value="">Alvarez</option>
                                <option value="">Gomez</option>
                                <option value="">Rimola</option>
                                
                            </select>
                        </div>                            

                        {{-- <x-label class="text-xs sm:text-sm hidden sm:flex ml-4 pl-4 pt-3 pb-2" for="buscaActividad" :value="__('Buscar:')" />

                        <div>
                            <input id = "buscaActividad" placeholder="Buscar" class="sm:text-sm focus:outline-none hover:border-purple-300 focus:ring-2 focus:ring-purple-200 mt-2 bg-gray-200 rounded-full flex px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 ml-2"> 
                        </div>
                        <div>
                            <button class="pt-1 h-10 mt-1" type="submit" > <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div> --}}
                        
                        <div  class="mx-2 w-60 shrink flex-wrap">
                            <x-label class="pt-3 text-xs sm:text-sm" for="categoriasFiltro" :value="__('Periodo:')" />
                            <select name="categoriasFiltro" id="categoriasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg  border-gray-600  " >
                                <option value="">01/02/2023 - 31/02/2023</option>
                                <option value="">18/03/2023 - 15/04/2023</option>
                                
                            </select>
                        </div> 
                        
                            
                        <div  class="mx-2 w-48 shrink flex-wrap">
                            <x-label class=" pt-3  text-xs sm:text-sm" for="categoriasFiltro" :value="__('Categorias')" />
                            <select name="categoriasFiltro" id="categoriasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg  border-gray-600  " >
                                <option value="" >Todas</option>
                                {{-- @foreach ($especialidades as $esp)
                                    <option value= {{$esp->idespecialidad}} {{(old('categoriasFiltro') == strtolower($esp->descripcion)) ? 'selected' : '' }}> {{$esp->descripcion}} </option>                      
                                @endforeach --}}
                            </select>
                        </div>   

                    </div>  
                        
                </form>

            </div>

            {{-- <div class="flex items-center justify-between pb-4 px-4">
                <table class=" min-w-full text-sm text-left text-gray-500 border-solid border-collapse">
                    <thead class=" text-gray-700 uppercase bg-indigo-200 text-xs sm:text-sm ">
                        <tr>
                            <th scope="col" class="border px-6 py-2 text-xs sm:text-sm w-4">
                                Nombre Actividad
                            </th>
                            <th scope="col" class="border px-6 py-2 h-2 text-xs sm:text-sm">
                                Avance
                            </th>
                            <th scope="col" class="border px-6 py-2 text-xs sm:text-sm  w-20">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <form method="GET" >
                    <tbody>
                       
                        <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                               <td scope="row" class="border  px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                    Saltar la cuerda
                                </td>

                                <td scope="row" class=" border px-2 py-2 font-medium whitespace-nowrap uppercase text-black">
                                    <div class="mt-2 bg-gray-600 rounded-full ">
                                        <div class="w-8/12 mt-2 bg-purple-900 py-1 text-center rounded-full text-white"><div class="text-white text-sm inline-block bg-purple-700  rounded-full">70%</div> - 8/12</div>
                                    </div>
                                </td>
                             
                                <td class="px-1 py-2 border w-30">
                                    <x-button class="w-30">
                                        <a href="{{route('actividades.comentarios')}}" class="font-medium ">Comentarios</a>
                                    </x-button>
                                </td>
                                
                        </tr>
                         
                        <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                            <form method="GET" >
                                <td scope="row" class="border px-6 py-2 font-medium whitespace-nowrap uppercase text-black">
                                    Jugar a las escondidas
                                </td>
                                <td scope="row" class="border w-100 px-2 py-2 font-medium whitespace-nowrap uppercase text-black">
                                    <div class="mt-2 bg-gray-600 rounded-full">
                                        <div class="w-12/12 mt-2 bg-green-600 py-1 text-center rounded-full text-white"><div class="text-white text-sm inline-block bg-white-700  rounded-full">100%</div>- 5/5</div>
                                    </div>
                                </td>
                                <td class="px-1 py-2 border w-30 ">
                                    <x-button class="w-30">
                                        <a href="{{route('actividades.comentarios')}}" class="font-medium ">Comentarios</a>
                                    </x-button>
                                </td>

                          
                        </tr>
                        
                    </tbody>
                </form>
                </table>
               
            </div> --}}


            <div class="container mx-1 sm:mx-2 ">
                    
                <table class="sm:mx-2 w-full flex sm:inline-table  overflow-auto flex-row flex-nowrap sm:bg-white rounded-lg  sm:shadow-lg my-5 ">
                    <thead class="text-black w-fit">

                        <tr class=" bg-indigo-200 w-fit flex flex-col flex-nowrap whitespace-nowrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="p-3 text-left border border-solid sm:w-2/5">Nombre Actividad</th>
                            <th class="p-3 text-left border border-solid sm:w-3/5">Avance</th>
                            <th class="p-3 text-left border border-solid sm:w-1/5" >Acciones</th>
                        </tr>
                        <tr class="sm:hidden w-fit bg-indigo-200 flex flex-col flex-nowrap whitespace-nowrap rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="p-3 text-left border border-solid">Nombre Actividad</th>
                            <th class="p-3 text-left border border-solid">Avance</th>
                            <th class="p-3 text-left border border-solid sm:w-110 " >Acciones</th>
                        </tr>
                    </thead>

                    <form method="GET" >

                    <tbody class="flex-1 sm:flex-none w-fit">
                    
                        <tr class="flex flex-col sm:table-row mb-2 sm:mb-0 w-fit">
 
                            <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap sm:w-fit">
                                Jugar escondidas
                            </td>
                            <td scope="row" class="border  p-3  font-medium whitespace-nowrap uppercase text-black">
                                <div class=" bg-gray-600 rounded-full ">
                                    <div class="w-8/12  bg-purple-900  text-center rounded-full text-white"><div class="text-white text-sm inline-block bg-purple-700  rounded-full">70%</div> - 8/12</div>
                                </div>
                            </td>
                            
                            <td class="border-grey-light border p-2 hover:bg-gray-100 whitespace-nowrap ">
                                <x-button class="w-30 px-1">
                                    <a href="{{route('actividades.comentarios')}}" class="font-medium ">Comentarios</a>
                                </x-button>
                            </td>

                        </tr>

                        <tr class="flex flex-col sm:table-row mb-2 w-fit">
 
                            <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap w-fit">
                                Saltar la cuerda
                            </td>
                            <td scope="row" class="border w-100 p-3  font-medium whitespace-nowrap uppercase text-black">
                                <div class=" bg-gray-600 rounded-full">
                                    <div class="w-12/12  bg-green-600  text-center rounded-full text-white"><div class="text-white text-sm inline-block bg-white-700  rounded-full">100%</div>- 5/5</div>
                                </div>
                            </td>
                            <td class="border-grey-light border p-2 hover:bg-gray-100 whitespace-nowrap ">
                                <x-button class="w-30 px-1">
                                    <a href="{{route('actividades.comentarios')}}" class="font-medium ">Comentarios</a>
                                </x-button>
                            </td>

                        </tr>

                        
                    </tbody>
                </form>
                </table>
            </div>

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

