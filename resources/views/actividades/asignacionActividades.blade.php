<x-app-layout>
    
    <div class="flex bg-white shadow-sm sm:rounded-lg mt-2  justify-center ">
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm ">Asignación de Actividades</h2>
    </div>
    
    <div class="flex flex-row justify-center" >
        <div id="mensajeOk" class="py-0 my-1" ></div>
    </div>
    
    <div id="defaultModalerror" data-modal-target = "defaultModalerror" tabindex="-1" aria-hidden="true" class="rounded-lg mt-2 mb-2 justify-center align-center fixed mx-100 my-center hidden w-full overflow-y-auto inset-0 h-[calc(100%-1rem)] ">
        <div class="relative w-full px-10 pt-10 justify-center">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow mt-10  justify-center">
                <!-- Modal header -->
                <div class="flex flex-wrap items-start justify-center p-3 border-b rounded-t  mx-center ">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Errores al asignar actividades
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="flex flex-row flex-wrap p-3 space-y-4 justify-center">
                    <p class=" text-black">
                        <div class="flex flex-row justify-center" >
                            <ul> 
                                <li id="listaErrores" class="py-0 my-1 mx-center" ></li>
                            </ul>
                        </div> 
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex flex-row p-4 space-x-2 border-t border-gray-200 rounded-b justify-center mx-center">
                    <x-button id="AceptarModalError" name="Aceptar" data-modal-hide="defaultModalerror" type="button" class="px-2 py-2" >Aceptar</x-button>
                </div>
        
            </div>
        </div>
    </div>


    <div class="bg-white shadow-sm sm:rounded-lg pb-2 mx-2 sm:mx-4 ">
 
        <div class="flex flex-row flex-wrap px-4 justify-center pt-2">  
            <x-label class="hidden sm:flex pt-3 pb-2 text-xs sm:text-sm" for="familiaFiltro" :value="__('Familia:')" />
            <div  class="mx-2 w-52 shrink">
                <select name="familiaFiltro" id="familiaFiltro" class=" sm:text-sm inline-flex items-center my-1 py-2 px-3 w-full h-auto text-white  focus:outline-none focus:bg-purple-300 focus:text-black focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm bg-gray-800  border-gray-600  " >
                    <option name="idFamilia" id="idFamilia" value= ""> Seleccione Familia </option>                      
                    @foreach ($familias as $fam)
                        <option name="idFamilia" id="idFamilia" value= {{$fam->id}} {{(old('familiaFiltro') == strtolower($fam->name)) ? 'selected' : '' }}> {{$fam->name}} </option>                      
                    @endforeach
                </select>
            </div>      
        </div>   

        <div class="flex flex-row justify-center mt-2 ">  
            <div class="flex flex-col pb-1 px-1  justify-center ">
                <div class="flex flex-row w-full justify-center ">
                    <x-label class="flex pb-2 text-xs sm:text-sm mr-4" for="iDesde" :value="__('Período de la actividad')" />    
                </div>  
                <div class="flex flex-row flex-wrap gap-1">
                    <x-label class="hidden sm:flex pt-3 pb-2 pl-1 text-xs sm:text-sm mr-4" for="iDesde" :value="__('Desde:')" />
                   
                    <div class="flex flex-row w-full justify-around sm:hidden">
                        <x-label class="flex flex-col pb-1 text-xs sm:text-sm " for="iDesde" :value="__('Desde')" />    
                        
                        <x-label class="flex flex-col pb-1 text-xs sm:text-sm " for="iDesde" :value="__('Hasta')" />    
                    </div>  

                    <x-input placeholder="Desde" class="mx-auto h-10 w-30 px-2" id="iDesde" name="iDesde" type="date" min="{{date('Y-m-d')}}" value="{{old('iDesde')}}">{{old('iDesde')}} </x-input>
          
                    <x-label class="hidden sm:flex pt-3 pb-2 text-xs sm:text-sm ml-4  mr-4" for="iHasta" :value="__('Hasta:')" />
 
                    <x-input placeholder="Hasta" class="mx-auto h-10 w-30 px-2" id="iHasta" name="iHasta" type="date" min="{{date('Y-m-d')}}" value="{{old('iHasta')}}"> "{{old('iHasta')}} </x-input>
                </div>
            </div>
        </div>
    
    </div>
        
        <form method="GET" action="{{route("asignacionActividades.filtrar")}}" id="formulario" name="formulario" >
        
        <div class="flex flex-col pt-2 ">
            <div class="flex flex-col bg-white shadow-sm sm:rounded-lg pb-2  mx-2 sm:mx-4  ">
                <div class="flex flex-row">
                    <x-label class="text-xs sm:text-sm hidden sm:flex sm:ml-4 pl-4 pt-3 pb-2" for="filtroActividad" :value="__('Buscar:')" />
                    <div>
                        <input id = "filtroActividad" name = "filtroActividad"  placeholder="Nombre Actividad" class="sm:text-sm focus:outline-none hover:border-purple-300 focus:ring-2 focus:ring-purple-200 mt-2 bg-gray-200 rounded-full flex px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 ml-2"> 
                    </div>
                    <div>
                        <button id = "buscaActividad" class="pt-1 h-10 mt-1" type="" > <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between pb-2 ">

                    <div class="container mx-0 sm:mx-2 ">
                    
                        <table id = "tablaActividades" name="tablaActividades" class=" sm:mx-2 w-full flex sm:inline-table  overflow-auto flex-row flex-nowrap sm:bg-white rounded-lg  sm:shadow-lg my-5 ">
                            <thead class="text-black ">
    
                                <tr class="flex justify-center text-xs sm:text-sm bg-indigo-200 flex-col flex-nowrap whitespace-nowrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                    <th class="p-3 text-left border border-solid ">Sel</th>
                                    <th class="p-3 text-left sm:text-center border border-solid">Actividad</th>
                                    <th class="p-3 text-left sm:text-center border border-solid">Cant. Diaria</th>
                                    <th class="p-3 text-left sm:text-center border border-solid sm:w-110 h-15" >Info</th>
                                    <th class="p-3 text-left border border-solid ">Avance Act. vigente</th>
                                </tr>

                                @php $cont = 0 @endphp
                                @foreach($actividades as $act)
                                    @php
                                        $cont = $cont + 1;
                                    @endphp
                                    @if ($cont > 1)
                                        
                                        <tr class="flex justify-center  text-xs sm:text-sm sm:hidden bg-indigo-200  flex-col flex-nowrap whitespace-nowrap rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                            <th class="p-3 text-left border border-solid ">Sel</th>
                                            <th class="p-3 text-left sm:text-centert border border-solid">Actividad</th>
                                            <th class="p-3 text-left border border-solid">Cant. Diaria</th>
                                            <th class="p-3 text-left sm:text-center border border-solid sm:w-110 h-15" >Info</th>
                                            <th class="p-3 text-left border border-solid ">Avance Act. vigente</th>
                                        </tr>
                                        
                                    @endif
                                @endforeach
    
                            </thead>
                                
                            <tbody class="flex-1 sm:flex-none" >
                            
                                @foreach ($actividades as $act)                            
                                    <tr class="flex flex-col  text-xs sm:text-sm sm:table-row mb-2 sm:mb-0 w-50 md:w-fit">
                                        <td class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap justify-center">
                                            <div class="flex flex-row justify-center py-0 sm:py-1 text-xs sm:text-sm">
                                                <x-input type="checkbox" name="chkItem" id="chkItem" ></x-input>
                                            </div>
                                        </td>
                                        
                                        <td name="idactividad" hidden class="border-grey-light border hover:bg-gray-100 p-3 whitespace-nowrap">
                                             {{$act->idactividad}} 
                                        </td>

                                        <td  class="border-grey-light border hover:bg-gray-100 px-1 py-3 whitespace-nowrap">
                                            {{$act->nombre   . ' '. ($act->tipoactividad == 'J' ? '(JUEGO)' : '')}}
                                        </td>

                                        <td class="gap-1  border hover:bg-gray-100 p-1.5 flex-nowrap whitespace-nowrap ">
                                            <div class="flex flex-row justify-center">
                                                <x-input type="number" min="0" max="50" class="w-20 h-7"></x-input>
                                            </div>
                                        </td>
                                        
                                        <td class="border-grey-light border hover:bg-gray-100 px-2 py-2">
                                            <x-button class="py-0 whitespace-nowrap h-6 " data-modal-target="defaultModal-{{$act->idactividad}}" data-modal-toggle="defaultModal-{{$act->idactividad}}" type="button">
                                                <a class="px-2 my-0 font-medium" >+Info</a>
                                            </x-button>
                                           
                                            <div id="defaultModal-{{$act->idactividad}}"  data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-auto p-4  overflow-y-auto md:inset-0 h-[calc(100%-1rem)] ">
                                                <div class="relative w-[50%] max-w-2xl max-h-full ">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow">
                                                        <!-- Modal header -->
                                                        <div class="flex flex-wrap items-start justify-center p-4 border-b rounded-t">
                                                            <h3 class="text-xl font-semibold text-gray-900">
                                                                Informacion de la actividad
                                                            </h3>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="flex flex-row flex-wrap p-6 space-y-6">
                                                            <p class=" text-black">
                                                                {{$act->descripcion }}
                                                            </p>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="flex flex-row p-6 space-x-2 border-t border-gray-200 rounded-b justify-center">
                                                            <x-button name="Aceptar" data-modal-hide="defaultModal-{{$act->idactividad}}" type="button" class="px-2 py-2" >Aceptar</x-button>
                                                        </div>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        

                                        <td name="cantRealizado" class="flex justify-left border-grey-light border hover:bg-gray-100 py-3 px-1 whitespace-nowrap">
                                           -
                                        </td>
                                                                                   
                                        <div id="defaultModalEliminar-{{$act->idactividad}}" tabindex="-1" aria-hidden="true" class="flex fixed top-0 left-0 right-0 z-50 w-auto p-4 overflow-y-auto md:inset-0 h-[calc(100%-1rem)] justify-center items-center hidden">
                                            <div class="relative w-[50%] max-w-2xl max-h-full border-2 border-gray-500 rounded-lg">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <!-- Modal header -->
                                                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                                                        <h3 class="text-xl font-semibold text-gray-900">
                                                            Eliminación de actividad
                                                        </h3>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-6 space-y-6">
                                                        <p class=" text-black">
                                                            Desea eliminar los avances realizados de la actividad seleccionada?
                                                        </p>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex flex-row p-6 space-x-2 border-t border-gray-200 rounded-b justify-center">
                                                        <x-button data-idactividad="{{$act->idactividad}}" data-modal-target="defaultModalEliminar-{{$act->idactividad}}"  name="ConfirmaEliminar" data-modal-hide="defaultModalEliminar-{{$act->idactividad}}" type="button" class="px-2 py-2" id="ConfirmaEliminar-{{$act->idactividad}}">Aceptar</x-button>
                                                        <x-button data-modal-target="defaultModalEliminar-{{$act->idactividad}}"  name="CancelaEliminar"  data-modal-hide="defaultModalEliminar-{{$act->idactividad}}" type="button" class="px-2 py-2">Cancelar</x-button>
                                                        <input type="hidden" name="idactividad"/>
                                                    </div>
                                            
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </tr>

                                @endforeach
                                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex flex-row mx-4 pb-1">
                <a href="">{{ $actividades->links('vendor.pagination.tailwind') }}</a> 
            </div>
        </form> 
            
        <div class="mx-6 my-3">
            <x-button class="bg-green-600 py-2" id="btnGuardar" type="button">
                <a  class="px-2 font-medium ">Guardar</a>
            </x-button>
            <x-button class="bg-red-600 py-2">
                <a href = "{{route('principal')}}" class="px-2 font-medium ">Cancelar</a>
            </x-button>
        </div>

<button hidden id = "btnEliminarVigente" title="Eliminar Actividad Vigente" class="w-10 ml-1 px-1 py-0 items-center bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widestfocus:text-gray-200 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 active:bg-purple-300  disabled:opacity-25 transition ease-in-out duration-150"  >
</button>
<script>

$(document).ready(function(){

    let valFecDesde = "";
    let valFecHasta = "";
    let valSelFamilia = "";

    const boton = document.getElementById('btnGuardar');
    const fecDesde = document.getElementById('iDesde');
    const fecHasta = document.getElementById('iHasta');
    const selFamilia =  document.getElementById('familiaFiltro');
    const botonAceptarModalError = document.getElementById('AceptarModalError'); 
    const defaultModal = document.getElementById('defaultModal'); 

    $("[name='ConfirmaEliminar']").each(function () {
          this.addEventListener('click', function(e){
          eliminarActFamilia($(this).data("idactividadfamilia"));

     })
    })
        
    boton.addEventListener('click', function(e){
        
        grabar();
        setTimeout("$('#formulario').submit()", 2500)
        
    })

    fecDesde.addEventListener('change', function(e){
     
        valFecDesde = this.value;
        BuscarRealizados();

    })

    fecHasta.addEventListener('change', function(e){
   
        valFecHasta = this.value
        BuscarRealizados();
    })
    
    selFamilia.addEventListener('change', function(e){
       
        valSelFamilia = this.value;
        BuscarRealizados();
     })

     
    function eliminarActFamilia(idActividadFamilia)
    {  
        eliminar(idActividadFamilia);
        
    }

    const BuscarRealizados = () =>
    { 
        if( valSelFamilia && valFecHasta && valFecDesde )
        {
            $.ajax({
                url: '/actividades/realizado/'+ valSelFamilia + '/'  + valFecDesde + '/'+ valFecHasta ,
                type: 'GET',
                success: function (response) {

                    $("#tablaActividades tbody tr").each(function () {
                        row = $(this);
                    
                        idactividad= row.find('td[name="idactividad"]').text().trim();
                        const btnEliminarVigenteClass =  document.getElementById('btnEliminarVigente').className; 
                        ColCantDias= row.find('td[name="cantRealizado"]');
                        ColCantDias.html("-"); 
                        response.forEach(item => {
                          
                            if(item.idactividad == idactividad) // && item.cantdiasfinalizados != 0
                            { 
                               ColCantDias.html(item.cantdiasfinalizados +  ' entre ' +  item.fecdesde + '-' + item.fechasta + '' );
                               ColCantDias.append(
                                    $('<button data-idactividadfamilia='+item.idactividadfamilia+' name="btnEliminaActFamilia" type="button" data-modal-target="defaultModalEliminar-'+item.idactividad+'" data-modal-toggle="defaultModalEliminar-'+item.idactividad + '"  title="Eliminar Actividad Vigente" id="btnEliminar-'+item.idactividadfamilia+'" >').addClass(btnEliminarVigenteClass).append('X')
                                )
                                        
                                $(document).on("click", "#" + "btnEliminar-"+item.idactividadfamilia, function(){
                                    $('#defaultModalEliminar-'+item.idactividad).removeClass('hidden'); 
                                    $('#defaultModalEliminar-'+item.idactividad).addClass('flex'); 
                                    $('#ConfirmaEliminar-'+item.idactividad).attr('data-idactividadfamilia', item.idactividadfamilia);

                                });
                            
                            }

                        });
                
                    });

                    },
                    failure: function (response) {
                        alert(response.responseText);
                    },
                    error: function (response) {
                        alert(response.responseText);
                    }
                })

        }
       
    }


    const grabar = () =>
    { 
        var seleccion = [];
        var fecDesde = '';
        var fecHasta = '';
        
        $("#tablaActividades tr td div input[type='checkbox']:checked").each(function () {
            row = $(this).closest('tr');
            
            seleccion.push({
                idactividad: row.find('td:eq(1)').text().trim(),
                cantidad: row.find('td:eq(3)').find('input').val(),
                realizado: row.find('td:eq(5)').text().trim()
            });
        });

        fecDesde = document.getElementById('iDesde').value;
        fecHasta = document.getElementById('iHasta').value;
        idFamilia = document.getElementById('familiaFiltro').value;
        
        $.ajax({
                url: '/actividades/asignacion/nueva',
                data: JSON.stringify({
                    'itemSel':seleccion,
                    'fecDesde': fecDesde,
                    'fecHasta': fecHasta,
                    'idFamilia': idFamilia,
                    '_token': "{{ csrf_token() }}"
                }),

                type: 'POST',
                contentType: 'application/json; charset=utf-8',

            }).done(function (data, filtroact) {

                if (data[0]['status'] == true)
                { 
                    $("#filtroActividad").val("");
                    $('#mensajeOk').removeClass();
                    $('#mensajeOk').addClass("text-green-500");
                    $("#mensajeOk div").remove();
                    $('#mensajeOk').append('<div>' + data[0]['message'] + '</div>');
                    //$('#formulario').refresh();                    
                    //BuscarRealizados();

                }   
                 else
                {                       
                    $("#listaErrores div").remove();
                   
                    $.each(data, function(i, item){

                        $('#listaErrores').removeClass();
                        $('#listaErrores').addClass("text-red-600");
                        $('#listaErrores').append('<div>' + item['message'] + '<br></div>');
                    
                    })

                  $('#defaultModalerror').removeClass('hidden');
         
                }
            }).fail(function (jqxhr, textStatus, error) {
                console.log('ERROR AL GRABAR');
                console.log('Error al grabar: ' + jqxhr.responseText);
                var response = JSON.parse(jqxhr.responseText);
            });
    
    }


    const eliminar = (idActividadFamilia) =>
      { console.log(idActividadFamilia);
            
          $.ajax({
              url: '/actividadesFamilia/asignacion/eliminar/' + idActividadFamilia,
                  data: JSON.stringify({
                      '_token': "{{ csrf_token() }}"
                  }),
              type: 'POST',
              contentType: 'application/json; charset=utf-8',

          }).done(function (data) {
                         
            if (data[0]['status'] == true)
            {
                    $("#filtroActividad").val("");
                    $('#mensajeOk').removeClass();
                    $('#mensajeOk').addClass("text-green-500");
                    $("#mensajeOk div").remove();
                    $('#mensajeOk').append('<div>' + data[0]['message'] + '</div>');

                    BuscarRealizados();
            }   
            else
            {                       
                $("#listaErrores div").remove();
                
                $.each(data, function(i, item){
                    
                    if(item['message'] != null)
                    {
                        $('#listaErrores').removeClass();
                        $('#listaErrores').addClass("text-red-600");
                        $('#listaErrores').append('<div>' + item['message'] + '<br></div>');
                    }
                })

                $('#defaultModalerror').removeClass('hidden');
        
            }
          }).fail(function (jqxhr, textStatus, error) {
              console.log('ERROR AL GRABAR');
              console.log('Error al grabar: ' + jqxhr.responseText);
              var response = JSON.parse(jqxhr.responseText);
          });
      
      }



});

</script>

</x-app-layout>

