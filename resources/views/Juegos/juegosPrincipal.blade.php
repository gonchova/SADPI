<x-app-layout>

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

    <div class="flex justify-center mt-2">
        <a href="{{ route('principal') }}">
            <x-button type="button" id="btnVolver" class="px-2">
                {{ __('Volver') }}
            </x-button>
        </a>
    </div>
    
   <div class="flex flex-wrap gap-4 justify-center ">

    @foreach ($juegos as $juego)
        
        @if($juego->idactividad == 1)
            <input hidden type="text" name="idActividadFamilia1" id="idActividadFamilia1" value={{$juego->idactividadfamilia}}>
            <div id  = "cardAnimalesIA" class="flex flex-col max-w-sm rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-2 hover:cursor-pointer select-none">
                <div class="bg-orange-500 h-15 rounded">
                    <img class="w-full h-full" src="{{asset('img/IconoAnimales2.png')}}" alt="Mostrar el animal correcto">
                </div>
                <div class="px-6 py-2 block ">
                    <div class="font-bold text-xl pb-2 fuenteFichas">Elegir el animal correcto</div>
                    <p class="text-gray-700 text-base">
                        El juego se basa en detectar si la ficha del animal que muestra el niña/o corresponde al que se solicita. Se utiliza IA para detectar la ficha en vivo.
                    </p>
                </div>
                
                <div class="px-6 pt-4 pb-2 mt-auto">
                    <x-label>
                        <div>Período: {{date("d/m/Y", strtotime($juego->fecdesde))}} al {{date("d/m/Y", strtotime($juego->fechasta))}}  </div>
                    </x-label>

                    <x-label>
                        <div>Avance de la Actividad:</div>
                    </x-label>
                    <div class="mt-2 bg-gray-600 rounded-full">
                        <div class="w-8/12 mt-2 bg-purple-900 py-1 text-center rounded-full"><div class="text-white text-sm inline-block bg-purple-700  rounded-full">75%</div></div>
                    </div>
                </div>
            </div> 
        @endif  

        @if($juego->idactividad == 2)
            <input hidden type="text" name="idActividadFamilia2" id="idActividadFamilia2" value={{$juego->idactividadfamilia}}>
            <div id  = "cardFichas" class=" flex flex-col max-w-sm rounded-lg overflow-hidden shadow-lg bg-gray-200 pt-4 mt-4 mx-2 hover:cursor-pointer select-none ">
                <div class="h-15">
                    <img class="w-full h-full" src="{{asset('/img/IconoFichasv1.png')}}" alt="Colocar Fichas">
                </div>
                
                <div class="px-6 py-2">
                <div class="font-bold text-xl pb-2 fuenteFichas rounded">Colocar Fichas</div>
                <p class="text-gray-700 text-base">
                    El juego se basa en colocar la ficha correctamente según su tipo.
                </p>
                </div>

                <div class="px-6 pt-4 pb-2 mt-auto">
                    <x-label>
                        <div>Período: {{date("d/m/Y", strtotime($juego->fecdesde))}} al {{date("d/m/Y", strtotime($juego->fechasta))}}  </div>
                    </x-label>
                    <x-label>
                        <div>Avance de la Actividad:</div>
                    </x-label>
                    <div class="mt-2 bg-gray-600 rounded-full">
                        <div class="w-3/12 mt-2 bg-purple-900 py-1 text-center rounded-full"><div class="text-white text-sm inline-block bg-purple-700  rounded-full">35%</div></div>
                    </div>
                </div>

            </div> 
        @endif  
    @endforeach
    </div>
 
 <script>

$(document).ready(function(){
        
    let juegoAnimales = document.getElementById("cardAnimalesIA");
    let idActividadFamilia1 = document.getElementById("idActividadFamilia1").value;
    let idActividadFamilia2 = document.getElementById("idActividadFamilia2").value;

    console.log(idActividadFamilia2);

    if(juegoAnimales)
    {
        juegoAnimales.onclick = function () {
            console.log(idActividadFamilia2);
            window.location.href ="/animalesIA/"+idActividadFamilia1;      
            //window.location.href = "{{ route('animalesIA', " + idActividadFamilia1 + ") }}";
        };
    }
        
    let juegoFichas = document.getElementById("cardFichas");

    if(juegoFichas)
    {
        juegoFichas.onclick = function () {
        
        console.log(idActividadFamilia2);
        window.location.href ="/colocarFicha/"+idActividadFamilia2;  
        
        };
    }

});
</script>
</x-app-layout>