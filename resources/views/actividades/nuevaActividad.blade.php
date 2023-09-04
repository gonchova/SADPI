<x-app-layout>

    <div class="flex bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm ">Nueva Actividad</h2>
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
    


    <div class="flex flex-col bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center mx-4 sm:mx-20" >
     

    <form method="POST"  id="formulario" action="{{ route('actividades.save') }}">
        @csrf
        <div class="block mx-2">

            <div class="w-30 sm:w-1/2">
                <x-label class="pt-2" for="name" :value="__('Nombre Actividad:')" />
    
                <x-input maxlength="30" id="nombre" class="block mt-1 w-full h-10" type="text" name="nombre" :value="old('nombre')" required autofocus  />
            </div>
            
            <div class="w-full">
                <x-label class="pt-2 " for="descripcionActividad" :value="__('Descripción:')" />
                <textarea id="descripcion" name="descripcion" class="w-full  h-10" rows='1' placeholder='' >{{old('descripcion')}}</textarea>
            </div>

            <div class="w-30 sm:w-1/2">
                <x-label class="pt-2 justify-center" for="categorias" :value="__('Categoria')" />
                
                <select name="categorias" id="categorias" class="py-1 text-sm font-semibold  mb-2 sm:text-sm  my-1 w-40  h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200  rounded-lg   border-gray-600  " >
                    <option name="categoriasvalor" id="categoriasvalor" value="" >Todas</option>
                    @foreach ($especialidades as $esp)
                        <option value= {{$esp->idespecialidad}} {{(old('categorias') == ($esp->idespecialidad)) ? 'selected' : '' }}> {{$esp->descripcion}} </option>                      
                    @endforeach
                </select>
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
                                <tr class="hidden bg-white border-b hover:bg-gray-200 text-xs sm:text-sm shrink">
                                    <td scope="row" class="border font-medium  text-black shrink">                                      
                                    </td>
                                    <td scope="row" class="border font-medium  text-black shrink">                                        
                                    </td>
                                    <td scope="row" class= "px-1 py-1 border uppercase  grow-0">
                                        <x-button class="px-2 bg-red-600 py-2" id="btnEliminar">
                                            <a href="#" class="font-medium">Eliminar</a>
                                            
                                        </x-button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                </div>
            </div>

           <div class="flex justify-center mb-2">
                <x-button class="bg-green-600 mt-5 mx-2 py-2"  id="btnGuardar">
                    <a class="px-2 font-medium">Guardar</a>
                </x-button>
                
                    <a href="{{route('actividades')}}" class="px-2 font-medium">
                        <x-button type="button" class="mt-5 mx-2 px-2 font-medium py-2">        
                        Volver
                        </x-button>
                    </a> 
            </div>
        </div> <!-- fin flex-row -->
        
    </form>
    </div>

    <script>

        var NroPaso = 1;
        
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
            
           
            function AgregaPaso()
            {   
                let textoPaso = document.getElementById('DescripcionPaso').value;
               
                if (!textoPaso.trim())
                    return;
                
                var btnEliminarClass = document.getElementById('btnEliminar').className;
                 //array('Nroresponsable' => '1'
                 $('#tablaPasos')
                .append(
                    $('<tr "id"= "item-'+NroPaso+'" "name"= "items-'+NroPaso+'">')
                    .append(
                        $('<td name=nropaso>')
                        .append(
                            NroPaso
                        ).addClass('border font-medium  text-black shrink')
                    )
                    .append(

                        $('<td>')
                        .append(
                            textoPaso
                        ).addClass('border font-medium  text-black shrink')
                    )
                    
                    .append(
                        $('<td>').addClass(" px-1 py-1 border lowercase grow-0")
                        .append(
                            $('<button id="btnEliminar-'+NroPaso+'" >').addClass(btnEliminarClass).addClass("Eliminar px-2 bg-red-600 ").append('<a>').addClass("font-medium").append('Eliminar')
                        )

                    )
                )     

                btnEliminar= document.getElementById('btnEliminar-'+NroPaso);
               
                btnEliminar.addEventListener('click', function(event)  {
                    event.target.parentNode.parentNode.remove();
                    renumerarFilas();
                })

                NroPaso++;    
                
                $("#DescripcionPaso").val("");
             
            }
            
        })
        
        function renumerarFilas()
        { 
            let cont = 1;

            let elementos = document.getElementsByName("nropaso");

            elementos.forEach(elemento => {
               
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

