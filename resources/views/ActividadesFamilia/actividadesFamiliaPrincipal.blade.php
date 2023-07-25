<x-app-layout>
   
    <div class="flex justify-center mt-2">
        <a href="{{ route('principal') }}">
            <x-button type="button" id="btnVolver" class="px-2">
                {{ __('Volver') }}
            </x-button>
        </a>
    </div>

    <div class="flex flex-wrap gap-4 justify-center w-full" id="container">
    
        @foreach ($actividadesFlia as $act)
        {{-- no debe traer juegos en esta pagina --}}
        @if($act->actividades->tipoactividad == 'A')

        <a href="{{ route('actividadesFamilia.actividadFamilia',['idactividadfamilia' => $act->idactividadfamilia])}}">
        {{-- <form method="GET" id = "formulario" action="{{route('actividadesFamilia.actividadFamilia',$act->idactividadfamilia)}}"> --}}
            <div id= "{{$act->idactividadfamilia}}" name="cardActividad" class="flex flex-col  max-w-80 w-80 rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4  hover:cursor-pointer select-none">
                
                <div class="flex px-6 py-2  justify-center">
                    <div class="font-bold text-xl pb-2 fuenteFichas">{{$act->actividades->nombre }} </div>
                </div>
                
                <div class="px-6 pt-4 pb-2 mt-auto">
                    <x-label>
                        <div>Avance de la Actividad: {{$act->intentosjuego}} aa</div>
                    </x-label>
                    <div class="mt-2 bg-gray-600 rounded-full">
                        @php
                            if($act->actividadesAvances)
                            { 
                                $cantfinalizado = $act->actividadesAvances->cantdiasfinalizados;
                            }
                            else 
                            {
                                $cantfinalizado = 0;
                            };
                        @endphp
                        <div name = "barraProgeso" valor = "{{ ($cantfinalizado *100)/$act->cantdias }}" class= "mt-2 bg-purple-900 py-1 text-center rounded-full"  style= {{"width:" .  ($cantfinalizado *100)/$act->cantdias  ."%" }}>
                            <div class="text-white text-sm inline-block bg-purple-700  rounded-full ">
                                {{ceil(($cantfinalizado *100)/$act->cantdias). "%"}}
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        {{-- </form> --}}
        @endif
        @endforeach
    </a>
    </div>


 <script>

$(document).ready(function(){

  Barra =  document.getElementsByName("barraProgeso")

  Barra.forEach(function(item, i) {  
        
        const progreso = item.getAttribute("valor");
        item.classList.remove("bg-purple-900","bg-green-600");
        
        if(progreso < 99)
        { item.classList.add("bg-purple-900");
        }else{
           item.classList.add("bg-green-600");
        }

    });
      

});


    </script> 
</x-app-layout>