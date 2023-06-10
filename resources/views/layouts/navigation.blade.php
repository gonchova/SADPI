 <nav class="bg-white border-gray-300 ">

    <div class="flex flex-wrap justify-between md:justify-left md:flex-nowrap w-full p-2 ">
    
      <a href="{{route('principal')}}" class="flex items-center mr-10">
          <img src="{{asset('img/Logo01-C.png')}}" class="h-10 mr-3" alt="Sadpi" />
      </a>
      
      <div class="">
        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " >
            <svg class="w-6 h-6"  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
      
        <div class="hidden w-full md:block " id="navbar-dropdown">

            <ul class="flex flex-col  font-medium p-4 md:p-0 mt-2 border border-gray-100 rounded-lg bg-gray-50 md:flex-row  md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
            
            {{-- Rol Coordinador --}}
            @if (auth()->user()->idrol == 1)  
            <li>
                <a href="{{route('nuevousuario')}}" class="block px-3 py-2 whitespace-nowrap hover:text-white  rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Alta Usuarios</a>
            </li>

            
            <li class="">
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-fit py-2 pl-3 pr-4  hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Actividades <svg class="w-5 h-5 ml-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44  ">
                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                        <li>
                        <a href="{{route('actividades')}}" class="block px-4 py-2 hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Administracion</a>
                        </li>
                        <li>
                        <a href="{{route('actividades.asignacion')}}" class="block px-4 py-2 hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Asignacion</a>
                        </li>
                        
                    </ul>
                    
                    </div>
            </li>
        
            <li>
                <a href="{{route('actividades.dashboard')}}" class="block px-3 py-2  hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Dashboard</a>
            </li>

            @endif
            {{-- Rol Familia --}}
            @if (auth()->user()->idrol == 2)    
                {{-- <li>
                    <a href="{{route('juegos')}}" class="block px-4 py-2  hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2 " aria-current="page">Juegos</a>
                </li>

                <li>
                    <a href="{{route('actividadesFamilia.principal')}}" class="block px-4 py-2  hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2 " aria-current="page">Actividades</a>
                </li> --}}
            @endif
            
            <div class="flex flex-row justify-end w-full">
                <ul class=" font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                    <li class="mx-auto ">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarUsuario" class="flex items-center  w-full italic py-2 pl-3 pr-4 hover:text-white rounded-md font-medium  leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">{{ Auth::user()->username }} <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbarUsuario" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44  ">
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                            <form method="POST" action="{{ route('logout') }}">
                                <li>
                                @csrf
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex flex-col justify-right  px-4 py-2  hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Salir</a>
                                </li>
                            </form>

                        </ul>
                        </div>
            
                    </li>
                </ul>
            </div>


            </ul>
        
        </div>
      
    </div>
  </nav> 

  
