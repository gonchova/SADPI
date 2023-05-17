<x-guest-layout>
   
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js" integrity="sha512-zYXldzJsDrNKV+odAwFYiDXV2Cy37cwizT+NkuiPGsa9X1dOz04eHvUWVuxaJ299GvcJT31ug2zO4itXBjFx4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

    <div class="flex bg-white shadow-sm sm:rounded-lg justify-center mb-2">
      <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Colocar Fichas</h2>
    </div>
  
    <div class="flex flex-row justify-center ">
        <h3 id="mensajeResultado" class="fuenteDivertida text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm"> <span id="resultado"></span>!</h3>
      </div>

        <div class="container grid grid-cols-2" >
              
            <div class="mx-3">
                <div class="flex flex-row mx-4">
                    <h3 class="fuenteDivertida">Fichas</h3>
                </div>
                <div class="column grid grid-rows-6 pl-8 ">  
                    <div class="list-group-item h-20 " draggable="true">
                       
                        <svg class="w-20 h-20 fill-blue-500 ">
                            <rect x="10" y="10" width="50" height="50" rx="15" ry="15" stroke="black" stroke-width="1" />
                        </svg>
                        
                    </div>

                    <div class="list-group-item h-20 w-20 py-2" draggable="true">
                        <svg class="w-20 h-20 fill-red-600">
                            <circle cx="35" cy="30" r="28" stroke="black"  stroke-width="1"/>
                        </svg>
                    </div>

                    <div class="list-group-item h-20  w-20" draggable="true">
                        <svg class="w-20 h-20 fill-red-600">
                            <rect x="10" y="10" rx="15" ry="15"  width="50" height="50"  stroke="black" stroke-width="1"/>
                        </svg>
                    </div>

                    <div class="list-group-item h-20 w-20 py-2" draggable="true">
                        <svg class="w-20 h-20 fill-green-600">
                            <circle cx="35" cy="30" r="28" stroke="black"  stroke-width="1"/>
                        </svg>
                    </div>

                    <div class="list-group-item h-20 w-20" draggable="true">
                        <svg class="w-20 h-20 fill-green-500">
                            <rect  x="10" y="10" width="50" height="50" stroke="black" stroke-width="1" />
                        </svg>
                    </div>

                    <div class="list-group-item h-20 w-20 py-2" draggable="true">
                        <svg class="w-20 h-20 relative fill-blue-500">
                            <circle cx="35" cy="30" r="28" stroke="black"  stroke-width="1"/>
                        </svg>
                    </div> 

                </div>
            </div>  
                <div class="mr-2 ">
                    
                    <h3 class="flex-col fuenteDivertida ">Rojos</h3>          
                    <div class="column flex flex-row  border-solid border-red-500 border-4 mt-2 justify-center min-h-[25%] flex-wrap">
                    
                    </div>
                    <h3 class=" fuenteDivertida ">Verdes</h3>
                    <div class="column flex flex-row border-solid border-green-500 border-4 mt-2 justify-center min-h-[25%] flex-wrap">
                    
                    </div>
                    <h3 class=" fuenteDivertida  ">Azules</h3> 
                    <div class="column flex flex-row  border-solid border-blue-500 border-4 mt-2 justify-center min-h-[25%] flex-wrap">
                    
                    </div>
                </div>
           
        </div>
    
 

<script>
    const columns = document.querySelectorAll(".column");

columns.forEach((column) => {
    new Sortable(column, {
        group: "shared",
        animation: 150,
        ghostClass: "blue-background-class"
    });
});


document.getElementById("resultado").innerHTML = 'UPS! VOLVE A INTENTARLO!';
document.getElementById("mensajeResultado").removeAttribute('class');
document.getElementById("mensajeResultado").classList.add('fuenteDivertidaMAL');

document.getElementById("resultado").innerHTML = 'BIEN HECHO!';
document.getElementById("mensajeResultado").removeAttribute('class');
document.getElementById("mensajeResultado").classList.add('fuenteDivertidaOK');


</script>
</x-guest-layout>