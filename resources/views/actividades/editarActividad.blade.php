<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva Actividad') }}
        </h2>
    </x-slot> --}}

    @php
        $id = 4;
    @endphp
    <!-- Main -->

    <div class="flex bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm ">Editar Actividad</h2>
    </div>


    <div class="flex flex-col bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center mx-10 sm:mx-40" >
                
        <div class="block mx-2">
           
            <div class="w-30 sm:w-1/2 flex flex-row">
                <x-label class="pt-2 mt-1" for="name" :value="__('Actividad:')" />
                <x-input id="nombre" class="block ml-4 mt-1 pt-2 w-50% " type="label" name="nombre" :value="old('nombre')"  disabled value="SALTAR LA CUERDA" />
            </div>
            
            <div class="w-30 sm:w-1/2">
                <x-label class="pt-2" for="name" :value="__('Nombre Paso:')" />

                <x-input id="nombre" class="in-line mt-1 " type="text" name="nombre" :value="old('paso')"  />
            </div>

            <x-button class="mt-5 mb-2" id="btnAgregarPaso">
                <a href="#" class="font-medium">Agregar Paso</a>
             </x-button>

            <div class="">
                <x-label class="pt-2 mb-2" for="nombre">Pasos de la Actividad:</x-label>
            </div>

            <div class="flex flex-col flex-shrink ">
            
                <table id="tablaPasos" class="text-sm text-left text-gray-500 border-solid border-collapse ">
               
                    <thead class="text-xs text-gray-700 uppercase bg-indigo-200 sm:text-sm ">
                        <tr class="shrink">
                            <th scope="col" class="border px-2  text-xs sm:text-sm">
                               #
                            </th>
                            <th scope="col" class="border px-2  h-1 text-xs sm:text-sm">
                               Descripcion paso
                            </th>
                            <th scope="col" class="border px-2  text-xs sm:text-sm  w-auto">
                               Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody class="">
                        <tr class=" bg-white border-b hover:bg-gray-200 text-xs sm:text-sm shrink">
                            <form method="GET" >
                                <td scope="row" class="border font-medium uppercase text-black shrink">
                                    1
                                </td>
                                <td scope="row" class="border font-medium uppercase text-black shrink">
                                    Correr hasta la puerta de la casa
                                </td>
                                <td scope="row" class= "px-1 py-1 border uppercase  grow-0">
                                    <x-button class=" bg-red-600" id="btnEliminar">
                                        <a href="#" class="font-medium">Eliminar</a>
                                    </x-button>
                                </td>
                            </form>
                        </tr>

                        <tr class=" bg-white border-b hover:bg-gray-200 text-xs sm:text-sm shrink">
                            <form method="GET" >
                                <td scope="row" class="border font-medium uppercase text-black shrink">
                                    2
                                </td>
                                <td scope="row" class="border font-medium uppercase text-black shrink">
                                    Tocar la puerta con la mano derecha
                                </td>
                                <td scope="row" class= " px-1 py-1 border uppercase  grow-0">
                                    <x-button class=" bg-red-600" id="btnEliminar">
                                        <a href="#" class="font-medium">Eliminar</a>
                                    </x-button>
                                </td>
                            </form>
                        </tr>

                        <tr class=" bg-white border-b hover:bg-gray-200 text-xs sm:text-sm shrink">
                            <form method="GET" >
                                <td scope="row" class="border font-medium uppercase text-black shrink">
                                    3
                                </td>
                                <td scope="row" class="border font-medium uppercase text-black shrink">
                                    Volver al punto de partida
                                </td>
                                <td scope="row" class= " px-1 py-1 border uppercase  grow-0">
                                    <x-button class=" bg-red-600" id="btnEliminar">
                                        <a href="#" class="font-medium">Eliminar</a>
                                    </x-button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                 </table>

           </div>

           <div class="flex justify-center mb-2">
                <x-button class="mt-5 mx-2">
                    <a href="#" class="font-medium">Guardar</a>
                </x-button>
                <x-button class="mt-5 mx-2">
                        <a href="#" class="font-medium">Cancelar</a>
                </x-button>
            </div>
        </div> <!-- fin flex-row -->
    
    </div>

    <script>

        var NroPaso = 1;

        $(document).ready(function(){

            $('#btnAgregarPaso').on('click', AgregaPaso);

        
            function AgregaPaso()
            {

                $('#tablaPasos')
                .append(
                    $('<tr>')
                    .append(
                        $('<td>')
                        .append(
                            NroPaso
                        ).addClass('border font-medium uppercase text-black shrink')
                    )
                    .append(

                        $('<td>')
                        .append(
                            'lalala'
                        ).addClass('border font-medium uppercase text-black shrink')
                    )

                   
                    
                    .append(
                        $('<td>')
                        .append(
                            $('<button>').addClass("bg-red-600").append('<a>').addClass("font-medium").append('Eliminar')
                        )

                    )
                )     
                
               
              NroPaso++;

                // var tabla = document.getElementById('tablaItems');
        
                // var fila = tabla.insertRow();
                
                // var celdaNumerador = fila.insertCell();
                // celdaNumerador.innerHTML = contador++;
                
                // var celdaInput = fila.insertCell();
                // var input = document.createElement('input');
                // input.type = 'text';
                // celdaInput.appendChild(input);
                
                // var celdaBoton = fila.insertCell();
                // var boton = document.createElement('button');
                // boton.innerHTML = 'Eliminar';

                // boton.onclick = function() {
                //     tabla.deleteRow(fila.rowIndex);
                //     renumerarFilas();
                // };
                // celdaBoton.appendChild(boton);
            }







        })
    </script>

</x-app-layout>

