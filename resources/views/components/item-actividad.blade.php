<div class="relative " id="item3">
    {{-- <button onClick="mostrar()" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"></button> --}}
    <div class="font-semibold uppercase rounded-md bg-indigo-800">
        {{ $tituloitem }}
    </div>
    <div class="rounded-md ring-1 ring-black hidden">
        {{ $content }} 
        <p class="text-lg">id= {{$iditem}}</p>
        
    </div>

</div>

{{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript ">

    var card  = document.getElementById('item3');

    $(document).ready(function() {

        card.addEventListener("click", () => {
                 alert("Nuevo texto desde evento");
            });
                        
   
        });


function mostrar() {alert('clicc')}
</script> --}}