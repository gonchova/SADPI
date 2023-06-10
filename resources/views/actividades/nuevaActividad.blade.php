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
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm ">Nueva Actividad</h2>
    </div>


    <div class="flex flex-col bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center mx-4 sm:mx-20" >

        <div class="block mx-2">

            <div class="w-30 sm:w-1/2">
                <x-label class="pt-2" for="name" :value="__('Nombre Actividad:')" />
    
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus  />
            </div>
            
            <div class="w-30 sm:w-1/2">
                <x-label class="pt-2" for="descripcionActividad" :value="__('Descripción:')" />
                <textarea class="w-full" rows='1' placeholder=''></textarea>
            </div>

            <div class="w-30 sm:w-1/2">
                <x-label class="pt-4 justify-center" for="categorias" :value="__('Categoria')" />
                
                <select name="categorias" id="categorias" class="py-1 text-sm font-semibold  mb-2 sm:text-sm  my-1 w-40  h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200  rounded-lg   border-gray-600  " >
                    <option value="">Todas</option>
                    <option value="">Autismo</option>
                </select>
            </div>

            <div class="flex flex-row  justify-center mt-2">
                <x-label class="mx-30 justify-center" for="name" :value="__('PASOS')" />
            </div>

            <div class="flex flex-col border p-3 border-indigo-400 rounded-md">
                    <div class="w-30 sm:w-1/2">
                        <x-label class="" for="DescripcionPaso" :value="__('Descripcion paso:')" />

                        <x-input id="DescripcionPaso" class="block mt-1 w-full" type="text" name="DescripcionPaso" :value="old('DescripcionPaso')" required autofocus  />
                    </div>

                    <x-button class="mt-5 mb-2 w-40" id="btnAgregarPaso">
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
                                            <x-button class="px-2 bg-red-600" id="btnEliminar">
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
                                            <x-button class="px-2 bg-red-600" id="btnEliminar">
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
                                            <x-button class="px-2 bg-red-600" id="btnEliminar">
                                                <a href="#" class="font-medium">Eliminar</a>
                                            </x-button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>

                </div>
            </div>

           <div class="flex justify-center mb-2">
                <x-button class="mt-5 mx-2">
                    <a href="#" class="px-2 font-medium">Guardar</a>
                </x-button>
                <x-button class="mt-5 mx-2">
                        <a href="#" class="px-2 font-medium">Cancelar</a>
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
                var textoPaso = document.getElementById('DescripcionPaso').value;
               
                 var btnEliminarClass = document.getElementById('btnEliminar').className;
                 
                
                 console.log(btnEliminarClass);
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
                            textoPaso
                        ).addClass('border font-medium uppercase text-black shrink')
                    )
                    
                    .append(
                        $('<td>').addClass(" px-1 py-1 border uppercase  grow-0")
                        .append(
                            $('<button "id"= "'+NroPaso+'">').addClass(btnEliminarClass).addClass("px-2 bg-red-600 ").append('<a>').addClass("font-medium").append('Eliminar')
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

