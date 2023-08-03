<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actividades') }}
        </h2>
    </x-slot> --}}
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
                                <select name="familiasFiltro" id="familiasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg border-gray-600  " >
                                    @foreach ($familias as $familia)
                                        <option value= {{$familia->id}}  {{(old('familiasFiltro') == strtolower($familia->name)) ? 'selected' : '' }}>{{$familia->name}}</option>
                                    @endforeach
                                
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
                            

                                
                            <div  class="mx-2 w-48 shrink flex-wrap">
                                <x-label class=" pt-3  text-xs sm:text-sm" for="categoriasFiltro" :value="__('Categorias')" />
                                <select name="categoriasFiltro" id="categoriasFiltro" class="text-xs sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white bg-gray-800 focus:outline-none hover:bg-purple-300 hover:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg  border-gray-600  " >
                                    <option value="" >Todas</option>
                                    @foreach ($especialidades as $esp)
                                        <option value= {{$esp->idespecialidad}} {{(old('categoriasFiltro') == strtolower($esp->descripcion)) ? 'selected' : '' }}> {{$esp->descripcion}} </option>                      
                                    @endforeach 
                                </select>
                            </div>   

                            <div class="flex flex-row justify-center mt-2 ">  
                                <div class="flex  flex-col pb-1 px-1  justify-center ">
                                    <div class="flex flex-row w-full justify-center ">
                                        <x-label class="flex pb-2 text-xs sm:text-sm mr-4" for="iDesde" :value="__('Período de la actividad')" />    
                                    </div>  
                                    <div class="flex flex-row w-full gap-1">
                                        <x-label class="hidden sm:flex pt-3 pb-2 pl-1 text-xs sm:text-sm mr-4" for="iDesde" :value="__('Desde:')" />
                                        <x-input class="px-2" id="iDesde" name="iDesde" type="date" min="" value="{{old('iDesde')}}">{{old('iDesde')}} </x-input>
                    
                                        <x-label class="hidden sm:flex pt-3 pb-2 text-xs sm:text-sm ml-4  mr-4" for="iHasta" :value="__('Hasta:')" />
                                        <x-input class="mx-auto" id="iHasta" name="iHasta" type="date" min="" value="{{old('iHasta')}}"> "{{old('iHasta')}} </x-input>
                                        <div id="status" class = "hidden mt-1" >
                                            <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-purple-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                        </div> 
                                    </div>

                                </div>
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

                    <table id = "tablaActividades" name="tablaActividades" class="sm:mx-2 w-full flex sm:inline-table  overflow-auto flex-row flex-nowrap sm:bg-white rounded-lg  sm:shadow-lg my-5 ">    
                        <thead id="headTable" name="headTable" class="text-black w-fit">

                            <tr name="titulos" class="hidden sm:visible bg-indigo-200 w-fit  flex-col flex-nowrap whitespace-nowrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-3 text-left border border-solid sm:w-1/5">Nombre Actividad</th>
                                <th class="p-3 text-left border border-solid sm:w-1/5">Período</th>
                                <th class="p-3 text-left border border-solid sm:w-4/5">Avance</th>
                                <th class="p-3 text-left border border-solid sm:w-10" >Acciones</th>
                            </tr>
{{--                             
                            <tr class="sm:hidden w-fit bg-indigo-200 flex flex-col flex-nowrap whitespace-nowrap rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-2 text-left border border-solid">Nombre Actividad</th>
                                <th class="p-2 text-left border border-solid">Período</th>
                                <th class="p-2 text-left border border-solid">Avance</th>
                                <th class="p-2 text-left border border-solid sm:w-110 " >Acciones</th>
                            </tr> --}}
                        </thead>

                        <form method="GET" >

                                <tbody class="flex-1 sm:flex-none w-fit">
                                
                                    <tr id = "fila" class="flex flex-col sm:table-row sm:mb-0 w-fit ">
                                        
                                        <td name="idactividad" hidden class="border-grey-light border hover:bg-gray-100 p-2 whitespace-nowrap">
                                            {{-- {{$act->idactividad}}  --}}
                                        </td>

                                        <td class="border-grey-light border hover:bg-gray-100 px-1 py-3 sm:py-0 whitespace-nowrap sm:w-fit">
                                            {{-- {{$act->nombre}}  --}}
                                        </td>

                                        <td class="border-grey-light border hover:bg-gray-100 px-1 py-3 sm:py-0 whitespace-nowrap sm:w-fit">
                                            {{-- {{$act->fecdesde}}  --}}
                                        </td>
                                        
                                        <td scope="row" class="border-grey-light border hover:bg-gray-100 px-1 py-3 sm:py-0 whitespace-nowrap sm:w-fit">
                                             
                                            {{-- <div class=" bg-gray-600 rounded-full ">
                                                <div class="w-8/12  bg-purple-900  text-center rounded-full text-white">
                                                    <div class="text-white text-sm inline-block bg-purple-700  rounded-full">70%</div> - 8/12</div>
                                            </div>  --}}

                                            
                                            <div hidden  valor = "" class= "mt-0 bg-purple-900 py-0 text-center rounded-full"  style="" >
                                                <div class="text-white text-sm inline-block bg-purple-700  rounded-full ">
                                                    {{-- {{ceil(($act->cantdiasfinalizados *100)/$act->cantdias). "%"}} --}}
                                                </div>
                                            </div>
                                        </td>

                                        <td hidden class="border-grey-light border hover:bg-gray-100 px-1 py-3 sm:py-0 whitespace-nowrap sm:w-fit">
                                            {{-- <button  class="w-30 px-1 items-center py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:bg-purple-300 focus:text-black active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"  >
                                                <a href="{{route('actividades.comentarios')}}" class="font-medium ">Comentarios</a>
                                            </button> --}}
                                        </td>

                                    </tr>


                                </tbody>

                        </form>
   
                    </table>
                </div>

            </div>
        
    </div> 

    <button hidden id = "btnComentarios" class="w-30 px-1 py-0 sm:p-2 items-center bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:bg-purple-300 focus:text-black active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"  >
        {{-- <a href="{{route('actividades.comentarios')}}" class="font-medium ">Comentarios</a> --}}
    </button>
    
    <div hidden id = "barraProgeso" valor = "" class= " bg-purple-900 p-0 my-3 sm:my-0 text-center rounded-full" > 
         <div class="text-white text-sm inline-block bg-purple-700  rounded-full ">
            {{-- {{ceil(($act->cantdiasfinalizados *100)/$act->cantdias). "%"}} --}}
        </div>
    </div>
</div>


{{-- <div name = "barraProgeso" valor = "{{ ($act->cantdiasfinalizados *100)/$act->cantdias }}" class= "mt-2 bg-purple-900 py-1 text-center rounded-full"  style= {{"width:" .  ($act->cantdiasfinalizados *100)/$act->cantdias  ."%" }}> --}}

<script>
    let valFecDesde = "";
    let valFecHasta = "";
    let valSelFamilia = "";
    let valSelCategoria = 0;

    const fecDesde = document.getElementById('iDesde');
    const fecHasta = document.getElementById('iHasta');
    const selFamilia =  document.getElementById('familiasFiltro');
    const selCategoria =  document.getElementById('categoriasFiltro');
    const spinner =  document.getElementById('status');

    valSelFamilia=selFamilia.value;
    
    fecDesde.addEventListener('change', function(e){
     
        valFecDesde = this.value;
        BuscarActividades();

     })

    fecHasta.addEventListener('change', function(e){

        valFecHasta = this.value
        
        BuscarActividades();
    })
    
    selFamilia.addEventListener('change', function(e){
        
        valSelFamilia = this.value;

        BuscarActividades();
    })

    selCategoria.addEventListener('change', function(e){
        
        valSelCategoria = this.value;
        
        if (!valSelCategoria)
            valSelCategoria = 0;

        BuscarActividades();
    })

    function formateaFecha(sFecha)
    {   
        if(sFecha)
        { 
            const date = new Date(sFecha);
            return date.toLocaleDateString('en-GB');
        }
        
        return sFecha;
    }

    const BuscarActividades = () =>
    { 
        if(valSelFamilia && valFecHasta && valFecDesde)
        {   
            spinner.classList.remove('hidden');

            $.ajax({
                url: '/dashboard/filtrar/'+ valSelFamilia + '/' + valFecDesde + '/' + valFecHasta + '/' + valSelCategoria,
                type: 'GET',
                success: function (response) {

                    $('#tablaActividades tbody').empty();
                    
                    const btnComentariosClass =  document.getElementById('btnComentarios').className; 
                    //const titulosTabla =  document.getElementById('titulos').className; 
                    const titulos = document.getElementsByName('titulos');
                                        
                    response.forEach(item => {
                         var urlcomentarios = "/actividades/comentario/";    
                         urlcomentarios =  urlcomentarios.concat(item.idactividadfamilia);
                         let diferencia = new Date(item.fechasta) - new Date(item.fecdesde);
                         let cantDiasActividad = Math.ceil(diferencia / (1000 * 3600 * 24)) + 1;

                        if (item.cantdiasfinalizados != cantDiasActividad)
                        {
                            color = "bg-purple-900"
                        }
                        else
                        {
                            color = "bg-green-600"
                        }

                        $('#tablaActividades thead')
                        .append(
                            $('<tr class="bg-indigo-200 w-full flex flex-col flex-nowrap whitespace-nowrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">')
                            .append(
                                $('<th class="p-3 text-left border border-solid sm:w-1/5 sm:hidden"   >')
                                .append(
                                    'Actividades'
                                )
                            )
                            .append(
                                $('<th class="p-3 text-left border border-solid sm:w-1/5 sm:hidden"  >')
                                .append(
                                   'Período'
                                )
                            )
                            .append(
                                $('<th class="p-3 text-left border border-solid sm:w-4/5 sm:hidden"  > ')
                                
                                .append(
                                   'Avance'
                                )
                            )
                            .append(
                                $('<th class="p-3 text-left border border-solid sm:w-10 sm:hidden"  >')
                                .append(
                                  'Acciones'
                                )
                            )
                        )     
                       

                        $('#tablaActividades tbody')
                         .append(
                            $('<tr "id"= "item-'+item.idactividadfamilia+'" "name"= "items-'+item.idactividadfamilia+'" class="flex flex-col  sm:table-row  sm:mb-0 w-fit">')
                            .append(
                                $('<td name=itemActividad>')
                                .append(
                                    item.nombre
                                ).addClass('border-grey-light border hover:bg-gray-100 px-1 py-3 sm:py-0 whitespace-nowrap sm:w-fit')
                            )
                            .append(
                                $('<td name=periodo >')
                                .append(
                                    formateaFecha(item.fecdesde) + " al " + formateaFecha(item.fechasta) 
                                ).addClass('border-grey-light border hover:bg-gray-100 px-1 py-3 sm:py-0 whitespace-nowrap sm:w-fit')
                            )
                            .append(
                                $('<td class="border-grey-light border hover:bg-gray-100 px-1 py-3 sm:py-0 whitespace-nowrap sm:w-fit"> ')
                                
                                .append(
                                    $('<div>').addClass(color + " p-0 sm:my-0 text-center rounded-full").css("width", Math.ceil(((item.cantdiasfinalizados *100)/cantDiasActividad))  + "%")
                                    .append('<div class="w-8/12  bg-purple-900  text-center rounded-full text-white">')
                                    .append( $('<div title=' + (item.cantdiasfinalizados +"/"+cantDiasActividad) + '>').addClass('text-white text-sm inline-block bg-purple-700  rounded-full').append( Math.ceil(((item.cantdiasfinalizados *100)/cantDiasActividad))+ "%" ))            

                                    )
                            )
                            .append(
                                $('<td>').addClass("border-grey-light border hover:bg-gray-100 px-1 py-3 mb-2  sm:py-0 whitespace-nowrap sm:w-fit")
                                .append(
                                    
                                    $("<a href=" + urlcomentarios + "></a>")
                                     .append(
                                         $('<button type="button"  id="btnComentarios-'+item.idactividadfamilia+'" >').addClass(btnComentariosClass).append('Comentarios')
                                     )
                                )
                                .append('<span class="inline-flex items-center justify-center px-2 text-xs font-bold leading-none text-purple-600 bg-indigo-200 rounded-full">' + item.cantcomentarios +'</span>')
                            )
                        )     
                        
                    });

                    spinner.classList.add('hidden');

                },
                failure: function (response) {
                    alert(response.responseText);
                    spinner.classList.add('hidden');
                },
                error: function (response) {
                    alert(response.responseText);
                    spinner.classList.add('hidden');
                }
                })

        }
        
    }

</script>

</x-app-layout>
