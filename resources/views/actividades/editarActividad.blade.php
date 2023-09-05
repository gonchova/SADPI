<x-app-layout>

    <div class="flex bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Edición de Actividad</h2>
    </div>

    <div class="flex flex-col bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center mx-4 sm:mx-20" >
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

        <form method="POST"  id="formulario" action="{{ route('actividades.update', $actividad->idactividad) }}">
            @method('PUT')
            @csrf
            <div class="block mx-2">
    
                <div class="w-full">
                    <x-label class="pt-2 " for="nombre" :value="__('Nombre Actividad:')" />
                    <x-label class="py-1 mb-2 pl-1 bg-gray-300 uppercase align-top border rounded-md"  name="nombre">{{$actividad->nombre}}</x-label>
                    {{-- <input id="nombre" class="block px-1 mt-1 w-full h-10  text-gray-600" type="text" name="nombre" value="{{$actividad->nombre}}" disabled autofocus > --}}
                </div>
                
                <div class="w-full">
                    <x-label class="pt-2 " for="descripcionActividad" :value="__('Descripción:')" />
                    <textarea id="descripcion" name="descripcion" class= "w-full h-20 px-1 overflow-auto" rows='1' placeholder='' >{{$actividad->descripcion}} </textarea>
                </div>
    
    
                <div class="flex flex-row  justify-center mt-2">
                    <x-label class="mx-30 justify-center" for="name" :value="__('PASOS')" />
                </div>
    
                <div class="flex flex-col border p-3 border-indigo-400 rounded-md">
                        <div class="w-30 sm:w-1/2">
                            <x-label class="" for="DescripcionPaso" :value="__('Descripcion paso:')" />
    
                            <x-input id="DescripcionPaso" class="block mt-1 w-full h-10" type="text" name="DescripcionPaso"  autofocus  />
                        </div>
    
                        <x-button class="mt-5 mb-2 w-40 py-2" id="btnAgregarPaso">
                            <a href="#" class="font-medium">Agregar Paso</a>
                        </x-button>
    
                        <div class="">
                            <x-label class="pt-2 mb-2" for="nombre">Pasos de la Actividad:</x-label>
                        </div>
    
                        <div class="flex flex-col flex-shrink ">
                       
                        
                            <table id="tablaPasos" class="text-sm text-left text-gray-500 border-solid border-collapse ">
                        
                                <thead class="text-xs text-gray-700 uppercase bg-indigo-200 sm:text-sm ">
                                    <tr class="shrink" type="input">
                                        <th scope="col" class=" border w-10 px-3 justify-center text-xs sm:text-sm">
                                        #
                                        </th>
                                        <th scope="col" class="border w-fit px-2  h-1 text-xs sm:text-sm ">
                                        Descripcion paso
                                        </th>
                                      <th scope="col" class=" border w-fit px-2  text-xs sm:text-sm ">
                                        Acciones
                                        </th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody class="">
                                    <tr class="hidden bg-white border-b hover:bg-gray-200 text-xs sm:text-sm shrink">
                                        <td scope="row" class="border font-medium  text-black shrink"></td>
                                        <td scope="row" class="border font-medium  text-black shrink"></td>
                                        <td scope="row" class= "px-1 py-1 border uppercase  grow-0">
                                            <x-button class="px-2 bg-red-600 py-2" id="btnEliminar">
                                                <a href="#" class="font-medium">Eliminar</a>
                                            </x-button>
                                        </td>
                                    </tr>

                                    @foreach($actividad->pasosactividad as $paso)
                                        <tr id= "item-{{$paso->idpaso}}" name= "items-{{ $paso->idpaso }}" class=" bg-white border-b hover:bg-gray-200 text-xs sm:text-sm shrink">
                                            <td  name="nropaso"  class="w-10 px-3 border mx-2 justify-center font-medium  text-black shrink">                                      
                                                 {{$paso->idpaso}}
                                            </td>
                                            <td class="w-fit px-3  border font-medium  text-black shrink">                                        
                                                {{$paso->descripcion}} 
                                            </td>
                                            <td name="tdEliminar"  class= "px-1 py-1 border uppercase  grow-0">
                                                <x-button name="btnEliminar" type="button" id="btnEliminar-{{$paso->idpaso}}"  class="px-2 bg-red-600 py-2"  onclick="eliminarPaso(event)">
                                                   Eliminar
                                                </x-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
    
               <div class="flex justify-center mb-2">
                    <x-button class="bg-green-600 mt-5 mx-2 py-2"  id="btnGuardar">
                        <a class="px-2 font-medium">Guardar</a>
                    </x-button>
                    
                    <a href="{{route('actividades')}}" class="px-2 font-medium">
                        <x-button class="mt-5 mx-2 px-2 py-2" type="button">
                            Volver
                        </x-button>
                    </a> 
                </div>
            </div> <!-- fin flex-row -->
            
        </form>
        </div>

    <script>

    renumerarFilas();
            
    $(document).ready(function(){

        var formulario= document.getElementById('formulario');
        
        formulario.addEventListener('submit', function(e)
        {
            event.preventDefault();

            var tabla = document.getElementById('tablaPasos');
            var filas = tabla.getElementsByTagName('tr');
            var datos = [];
            
            for (var i = 2; i < filas.length; i++) {
                var fila = filas[i];
                var celdas = fila.getElementsByTagName('td');
                var filaDatos = [];
                
                // Recorre las celdas de cada fila y agrega el contenido a un array
                for (var j = 0; j < celdas.length; j++) {
                    filaDatos.push(celdas[j].innerText);
                }
                
                // Agrega la fila de datos al array principal
                datos.push(filaDatos);
            }
            
            var inputDatos = document.createElement('input');
            inputDatos.type = 'hidden';
            inputDatos.name = 'datosTabla';
            inputDatos.value = JSON.stringify(datos);
            document.getElementById('formulario').appendChild(inputDatos);
            
            this.submit();
            
        });

        
        $('#btnAgregarPaso').on('click', function(event){
            event.preventDefault();
            
            AgregaPaso();
        });

        
        // $("#tablaPasos tbody tr td [name='btnEliminar']").each(function () {
           
            
        //      $(this).addEventListener('click', function(event)  {
        //          eliminarPaso(event);
        //      })
            
        //     console.log(this);
        //     //eliminarPaso
        // })
        
        function AgregaPaso()
        {   
            var textoPaso = document.getElementById('DescripcionPaso');
            
            if (!textoPaso.value.trim())
                return;

            console.log(textoPaso.value);

            var btnEliminarClass = document.getElementById('btnEliminar').className;
               // console.log(btnEliminarClass);
                //array('Nroresponsable' => '1'
            $('#tablaPasos')
            .append(
                $('<tr "id"= "item-'+NroPaso+'" "name"= "items-'+NroPaso+'" class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm shrink" >')
                .append(
                    $('<td name=nropaso>')
                    .append(
                        NroPaso
                    ).addClass('w-10 px-3  border font-medium justify-center text-black shrink')
                )
                .append(

                    $('<td>')
                    .append(
                        textoPaso.value
                    ).addClass('w-fit px-3 border font-medium  text-black shrink')
                )
                
                .append(
                    $('<td>').addClass(" px-1 py-1 border lowercase grow-0")
                    .append(
                        $('<button type="button" id="btnEliminar-'+NroPaso+'" onclick="eliminarPaso(event)">').addClass(btnEliminarClass).addClass("Eliminar px-2 bg-red-600 ")
                            .append('Eliminar')
                    )

                )
            )

            btnEliminar = document.getElementById('btnEliminar-'+NroPaso);
           
            btnEliminar.addEventListener('click', function(event)  {
                eliminarPaso(event);
                renumerarFilas();                
            });

            NroPaso++;    
            
            textoPaso.value= '';
            console.log(textoPaso.value);
    
        }
        
    })

    function eliminarPaso(event)
    {  
        event.target.parentNode.parentNode.remove();
        renumerarFilas();
    }

    
    function renumerarFilas()
    { 
        let cont = 1;

        let elementos = document.getElementsByName("nropaso");

        elementos.forEach(elemento => {
            //console.log(elementos);
            elemento.innerText = cont;
            cont++;
        });
        NroPaso=cont;
        //si es el ultimo, reinicia los pasos a 1
        if (cont==1)
            NroPaso=1;

    }

    

    </script>

</x-app-layout>

