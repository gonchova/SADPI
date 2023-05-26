<x-app-layout>
   
    <div class="flex  flex-row bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        <h2 class="text-gray-700 uppercase antialiased  font-bold text-sm">Comentarios de la Familia</h2>
    </div>

    <div class="flex flex-row flex-wrap mx-2 bg-white shadow-sm rounded-lg mt-2 mb-2 justify-between ">   
       
        <div class="text-gray-700 uppercase antialiased font-bold  text-sm ">
            <div class="flex flex-row">
                <x-label class="pt-2 mt-1 mx-1" for="name" :value="__('Familia:')" />
                <x-input id="nombre" class="pl-3 pt-3 " type="label" name="nombre" :value="old('nombre')"  disabled value="Gomez" />
                
            </div>
        </div>
        <div class="text-gray-700 uppercase antialiased  font-bold text-sm bg-white">
            <div class="flex flex-row">
                <x-label class="pt-2 mt-1  mx-1" for="periodo" :value="__('Período:')" />
                <x-input id="periodo" class="pl-3 pt-3  " type="label" name="periodo"  disabled value="01/02/2023 - 30/01/2023" />
            </div>
        </div>

        <div class="text-gray-700 uppercase antialiased  font-bold text-sm">
            <div class="flex flex-row">
                <x-label class="pt-2 mt-1  mx-1" for="periodo" :value="__('Actividad:')" />
                <x-input id="actividad" class="pl-3 pt-3 " type="label" name="actividad"  disabled value="SALTAR LA CUERDA" />
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between pb-4 ">

        <table class="w-auto text-sm text-left text-gray-500 border-solid mx-2 border-collapse ">
            <thead class="text-xs text-gray-700 uppercase bg-indigo-200 sm:text-sm ">
                <tr>
                    <th scope="col" class="border w-10 px-1 py-2 text-xs sm:text-sm sm:whitespace-nowrap">
                        Nro Intento
                    </th>
                    <th scope="col" class="border px-1 py-2 h-2 text-xs sm:text-sm">
                        Comentario
                    </th>
                </tr>
            </thead>
           
            <tbody>
                <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm ">
                    
                    <td scope="row" class="border px-6 py-2 font-medium  text-black ">
                        1
                    </td>
                
                    <td scope="row" class=" border px-4 py-2 font-medium italic text-black">
                        <p class="flex flex-col text-justify text-wrap " > Al principio no entendío la actividad, asi que se alejó y buscó sus juguetes. </p>
                    </td>
                    
                </tr>

                <tr class="bg-white border-b hover:bg-gray-200 text-xs sm:text-sm">
                   
                        <td scope="row" class="border px-6 py-2 font-medium  uppercase text-black">
                            4
                        </td>
                        <td scope="row" class="border px-4 py-2 font-medium  italic text-black">
                            <p class="flex flex-row text-justify text-wrap">Ya sabe que tiene que saltar la cuerda sin pisarla, lo intento varias veces en el día de hoy, lo hizo bien una vez por lo que festejamos con su comida favorita</p>
                        </td>
                
                </tr>
                
            </tbody>
      
        </table>
    </div>


</x-app-layout>
<script>
// document.getElementById("btnVolver").onclick = function() {  
//     document.querySelector('#name').required = false;
//     document.querySelector('#email').required = false;
//     document.querySelector('#username').required = false;
//     document.querySelector('#idrol').required = false;
//     document.querySelector('#password').required = false;
//     document.querySelector('#password_confirmation').required = false;
// }; 

</script>
