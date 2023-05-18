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
        
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Asignación de Actividades</h2>
   
    </div>
   
    <form method="GET" >

        <div class="bg-white shadow-sm sm:rounded-lg pb-2 mx-4 ">
            <div class="flex flex-row flex-wrap px-4 justify-center">  
                <x-label class="hidden sm:flex pt-3 pb-2 text-xs sm:text-sm" for="categoriasFiltro" :value="__('Familia:')" />
                <div  class="mx-2 w-52 shrink">
                    <select name="categoriasFiltro" id="categoriasFiltro" class=" sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white  focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm bg-gray-800  border-gray-600  " >
                        <option value="">Alvarez</option>
                        <option value="">Gomez</option>
                        <option value="">Ramirez</option>
                        <option value="">Todas</option>
                    </select>
                </div>      
            </div>   

            <div class="flex flex-row  px-4 justify-center mt-2 ">  
                <div class="flex  flex-col border p-4 border-indigo-300 justify-center">
                    <div class="flex flex-row w-full justify-center">
                        <x-label class="flex pb-2 text-xs sm:text-sm mr-4" for="iDesde" :value="__('Período de la actividad')" />    
                    </div>  
                    <div class="flex flex-row w-full">
                        <x-label class="hidden sm:flex pt-3 pb-2 text-xs sm:text-sm mr-4" for="iDesde" :value="__('Desde:')" />
                        <x-input id="iDesde" type="date"> </x-input>

                        <x-label class="hidden sm:flex pt-3 pb-2 text-xs sm:text-sm ml-4  mr-4" for="iHasta" :value="__('Hasta:')" />
                        <x-input id="iHasta" type="date"> </x-input>
                    </div>
                </div>
            </div>
        </div>



        <div class="flex flex-col pt-4 ">
            <div class="flex flex-col bg-white shadow-sm sm:rounded-lg pb-2 mx-4 ">
            <div class="flex flex-row">
                <x-label class="text-xs sm:text-sm hidden sm:flex ml-4 pl-4 pt-3 pb-2" for="buscaActividad" :value="__('Buscar:')" />
                <div>
                    <input id = "buscaActividad" placeholder="Nombre Actividad" class=" sm:text-sm focus:outline-none hover:border-purple-300 focus:ring-2 focus:ring-purple-200 mt-2 bg-gray-200 rounded-full flex px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 ml-2"> 
                </div>
                <div>
                    <button class="pt-1 h-10 mt-1" type="submit" > <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
                <div class="flex flex-col items-center justify-start pb-2">

                </div>

                <div class="flex  items-center justify-between pb-4 ">

                    <table class="w-full text-sm text-left text-gray-500 border-solid mx-2 border-collapse ">
                        <thead class=" text-gray-700 uppercase bg-indigo-200 text-xs sm:text-sm ">
                            <tr>
                                <th scope="col" class="border px-2 py-2 text-xs sm:text-sm w-1">
                                    Sel
                                </th>
                                <th scope="col" class="border w-auto px-2 py-2 text-xs sm:text-sm">
                                    Nombre Actividad
                                </th>
                                <th scope="col" class="w-20 border px-2 py-2 h-2 text-xs sm:text-sm">
                                    Cant. por Período
                                </th>
                                <th scope="col" class="wx-auto border px-6 py-2 text-xs sm:text-sm justify-center">
                                    Acciones
                                </th>
                                <th scope="col" class="w-8 px-2 border py-2 text-xs sm:text-sm ">
                                    Cant. Realizado
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                                <form method="GET" >
                                    <td scope="row" class="border  px-4 py-2 font-medium whitespace-nowrap uppercase text-black">
                                        <x-input type="checkbox">
                                        </x-input>
                                    </td>
                                    
                                    <td scope="row" class="border w-25  px-2 py-2 font-medium whitespace-nowrap uppercase text-black">
                                        Saltar la cuerda
                                    </td>
                                    <td scope="row" class="wx-auto border px-2 py-2 font-medium whitespace-nowrap uppercase text-black justify-center">
                                       <div class="flex flex-row justify-center">
                                        <x-input type="number" min="0" class="w-20" >

                                        </x-input>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 border ">
                                            <x-button>
                                                <a href="#" class="font-medium ">+Info</a>
                                            </x-button>
                                    </td>
                                    <td scope="row" class="border w-8 px-10  py-2 font-medium whitespace-nowrap uppercase text-black  justify-center">
                                       2
                                    </td>
                                </form>
                            </tr>

                            <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm ">
                                <form method="GET" >
                                    <td scope="row" class="border  px-4 py-2 font-medium whitespace-nowrap uppercase text-black">
                                        <x-input type="checkbox">
                                        </x-input>
                                    </td>
                                    
                                    <td scope="row" class="border w-25  px-2 py-2 font-medium whitespace-nowrap uppercase text-black">
                                        Jugar escondidas
                                    </td>
                                    <td scope="row" class="w-auto border px-2 py-2 font-medium whitespace-nowrap uppercase text-black  justify-left"">
                                        <div class="flex flex-row justify-center">
                                            <x-input type="number" min="0" class="w-20" >
    
                                            </x-input>
                                            </div>
                                    </td>
                                    <td class="px-6 py-2 border ">
                                            <x-button>
                                                <a href="#" class="font-medium ">+Info</a>
                                            </x-button>
                                    </td>

                                    <td scope="row" class="border w-8 px-10 py-2 font-medium whitespace-nowrap uppercase text-black  ">
                                        0
                                    </td>
                                </form>
                            </tr>
                            
                        </tbody>
                    </table>
                
                </div>
            </div>
            <div class="mx-6 my-3">
                <x-button class="bg-green-600 ">
                    <a href="#" class="font-medium ">Guardar</a>
                </x-button>
                <x-button class="bg-red-600 ">
                    <a href="#" class="font-medium ">Cancelar</a>
                </x-button>
            </div>
        </div> 

    </form>
   


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

