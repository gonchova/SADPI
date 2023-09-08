<x-guest-layout>
   
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js" integrity="sha512-zYXldzJsDrNKV+odAwFYiDXV2Cy37cwizT+NkuiPGsa9X1dOz04eHvUWVuxaJ299GvcJT31ug2zO4itXBjFx4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head> 

    <div class="flex flex-row justify-between bg-white shadow-sm sm:rounded-lg  mb-2 ">
          
        <a href="{{ route('colocarFicha',$actividadfamilia[0]->idactividadfamilia) }}" class="mx-auto my-20 justify-center">
            <x-button class="px-2 justify-center my-1 py-2 ">
                {{ __('Reintentar') }}
            </x-button>  
        </a>

        <input hidden id="idActividadFamilia" value ="{{$actividadfamilia[0]->idactividadfamilia}}">
        <input hidden id="idFamilia" value ="{{Auth::user()->id}}">

        <h2 class="text-gray-700  my-1 uppercase antialiased text-lg font-bold sm:text-sm ">Colocar Fichas</h2>      
        
        <a href="{{ route('principal') }}" class="mx-auto justify-center my-1">
            <x-button class="px-2 justify-center py-2">
                {{ __('Salir') }}
            </x-button>  
        </a>
      
    </div>

    <div class="flex flex-row justify-center ">
        <label  id="mensaje" class="text-green-500" ></label>
    </div>
            
    <div class="flex flex-row justify-center">
        <h3 id="mensajeResultado" class="fuenteDivertida text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm"> <span id="resultado"></span></h3>
    </div>

    <div class="flex justify-center min-h-fit">

        <div class="container grid grid-cols-2 mb-4 " >
            
            <div class="mx-3 ">

                <div class="flex flex-row mx-4">
                    <h3 class="fuenteDivertida">Fichas</h3>
                </div>

                <div class="flex flex-row min-h-full">

                    <div class="column grid grid-rows-6 pl-8 " id="cajaInicial">  
                        
                        <div id= "fichaCuadradaAzul" class="item fichaazul list-group-item h-20 " draggable="true">
                            <svg class="elemento w-20 h-20 fill-blue-500 ">
                                <rect x="10" y="10" width="50" height="50" rx="15" ry="15" stroke="black" stroke-width="1" />
                            </svg>
                        </div>

                        <div id= "fichaRedondaRoja" class="item ficharoja list-group-item h-20 w-20 py-2" draggable="true">
                            <svg class="elemento w-20 h-20 fill-red-600">
                                <circle cx="35" cy="30" r="28" stroke="black"  stroke-width="1"/>
                            </svg>
                        </div>

                        <div id= "fichaCuadradaRoja" class="item ficharoja list-group-item h-20 w-20" draggable="true" >
                            <svg class="elemento w-20 h-20 fill-red-600">
                                <rect x="10" y="10" rx="15" ry="15"  width="50" height="50"  stroke="black" stroke-width="1"/>
                            </svg>
                        </div>

                        <div id= "fichaRedondaVerde" class="item fichaverde list-group-item h-20 w-20 py-2" draggable="true">
                            <svg class="elemento w-20 h-20 fill-green-600">
                                <circle cx="35" cy="30" r="28" stroke="black"  stroke-width="1"/>
                            </svg>
                        </div>

                        <div id= "fichaCuadradaVerde" class="item fichaverde list-group-item h-20 w-20" draggable="true" >
                            <svg class="elemento w-20 h-20 fill-green-600">
                                <rect  x="10" y="10" width="50" height="50" stroke="black" stroke-width="1" />
                            </svg>
                        </div>

                        <div id= "fichaRedondaAzul" class="item fichaazul list-group-item h-20 w-20 py-2" draggable="true" >
                            <svg class="elemento w-20 h-20  fill-blue-500">
                                <circle cx="35" cy="30" r="28" stroke="black"  stroke-width="1"/>
                            </svg>
                        </div> 

                    </div>
                </div>

            </div>  

            <div class="mr-2 flex-row ">
                <h3 class="fuenteDivertida">Rojos</h3>          
                <div  class="column flex flex-row flex-wrap border-solid border-red-500 border-4 mt-1 justify-center min-h-[25%] " id="cajaRojos">
                </div>

                <h3 class="fuenteDivertida">Verdes</h3>
                <div  class="column flex flex-row flex-wrap order-solid border-green-500 border-4 mt-1 justify-center min-h-[25%] " id="cajaVerdes">
                </div>

                
                <h3 class="fuenteDivertida">Azules</h3>
                <div  class="column flex flex-row flex-wrap border-solid border-blue-500 border-4 mt-1 justify-center min-h-[25%]  " id="cajaAzules">
                </div>
            </div>
            
        </div>

    </div>


   
    </div>    

<script>
        
    let cantMovidos=0;

    const columns = document.querySelectorAll(".column");
    const cajaInicial = document.getElementById("cajaInicial");
    const cajaRojos = document.getElementById("cajaRojos");
    const cajaVerdes = document.getElementById("cajaVerdes");
    const cajaAzules = document.getElementById("cajaAzules");
    
    MezclaFichas();
    
    columns.forEach((column) => {
        new Sortable(column, {
            group: "shared",
            animation: 150,
            ghostClass: "blue-background-class",
            onEnd: function(e) {
                chequeaFinal();
            }
        });

    });

    function MezclaFichas()
    {   
        const colores = ['fill-red-600', 'fill-green-600', 'fill-blue-500','fill-red-600', 'fill-green-600', 'fill-blue-500'] ;
        const formas = ['circulo', 'cuadrado', 'triangulo'] ;

        mezcladas = mezclarArreglo(colores)
        
        console.log(mezcladas);

        const elementos = document.querySelectorAll('.item');
        const fichas = document.querySelectorAll('.elemento');
        
        let x = 0;

        fichas.forEach((ficha) => {
            
            ficha.classList.remove('fill-red-600', 'fill-green-600', 'fill-blue-500');
            ficha.classList.add(mezcladas[x]);
            ficha.parentNode.classList.remove('fichaazul', 'ficharoja', 'fichaverde');
            
            if(mezcladas[x]=='fill-red-600')
                ficha.parentNode.classList.add('ficharoja');
            if(mezcladas[x]=='fill-green-600')
                ficha.parentNode.classList.add('fichaverde');
            if(mezcladas[x]=='fill-blue-500')
                ficha.parentNode.classList.add('fichaazul');
            
            x += 1;
        });

    }

    function mezclarArreglo (arreglo) {

        for (let i = arreglo.length - 1; i > 0; i--) {
            let indiceAleatorio = Math.floor(Math.random() * (i + 1));
            let temporal = arreglo[i];
            arreglo[i] = arreglo[indiceAleatorio];
            arreglo[indiceAleatorio] = temporal;
        }
        return arreglo;
    }
 

    function chequeaFinal(color)
    {   
        cantMovidos++;
        cantCajaInicial = document.querySelectorAll('#cajaInicial .item').length;
       
        if(cantCajaInicial==0)
        {   
            itemsEnRojo=document.querySelectorAll('#cajaRojos .ficharoja');
            itemsEnVerde=document.querySelectorAll('#cajaVerdes .fichaverde');
            itemsEnAzul=document.querySelectorAll('#cajaAzules .fichaazul');

            if (itemsEnRojo.length == 2 && itemsEnVerde.length == 2 && itemsEnAzul.length == 2)
            {   
                grabar();
                document.getElementById("resultado").innerHTML = 'BIEN HECHO!';
                document.getElementById("mensajeResultado").removeAttribute('class');
                document.getElementById("mensajeResultado").classList.add('fuenteDivertidaOK');
                var sonido = new Audio("/sounds/BienHecho.mp3");
                sonido.play();
                
            }
            else{
                document.getElementById("resultado").innerHTML = 'UPS! Volvé a intentarlo!';
                document.getElementById("mensajeResultado").removeAttribute('class');
                document.getElementById("mensajeResultado").classList.add('fuenteDivertidaMAL');
                var sonido = new Audio("/sounds/Ups.mp3");
                sonido.play();
            }    

        }

    }


    const grabar = () =>
    { 
        idactividadFamilia = document.getElementById('idActividadFamilia').value;
        idFamilia = document.getElementById('idFamilia').value;
       
        $.ajax({
            url: '/colocarFicha/save/' + idactividadFamilia + '/' + idFamilia,
                data: JSON.stringify({
                    '_token': "{{ csrf_token() }}"
                }),
            type: 'POST',
            contentType: 'application/json; charset=utf-8',

        }).done(function (data) {
          
            if (data['status'] == true && data['message'])
            {   
                console.log(data);
                console.log($("#mensaje").text());
                
                $("#mensaje").text(data['message']);

            }   
            else if(data['status'] == false)
            {  
                $("#mensaje").val(data['message']);                 
        
            }
        }).fail(function (jqxhr, textStatus, error) {
            console.log('ERROR AL GRABAR');
            console.log('Error al grabar: ' + jqxhr.responseText);
            var response = JSON.parse(jqxhr.responseText);
        });
    
    }

</script>
</x-guest-layout>