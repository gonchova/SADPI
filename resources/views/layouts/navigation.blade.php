{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex" >
                <!-- Logo Home -->
                <x-nav-link :href="route('principal')" :active="false">
                    <div class="w-8">
                        <x-application-logo />
                    </div>
                </x-nav-link>
                
                
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                        @if (auth()->user()->idrol == 1)
                            <x-nav-link :href="route('actividades')" :active="request()->routeIs('actividades')">
                                {{ __('Actividades') }}
                            </x-nav-link>
                            
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('dashboard') }}
                            </x-nav-link>
                            
                            <x-nav-link> 
                              
                                <x-dropdown-menu  >
                                    <x-slot name="trigger" >
                                         {{ __('actividades') }}
                                    </x-slot>
                              
                                    <x-slot name="content">
                                        <x-dropdown-link>
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown-menu>
                            </x-nav-link>
                            

                            <x-nav-link :href="route('nuevousuario')" :active="request()->routeIs('nuevousuario')">
                                {{ __('Nuevo Usuario') }}
                            </x-nav-link>
                            
                        @endif

                        @if (auth()->user()->idrol == 2)                                               
                            <x-nav-link :href="route('juegos')" :active="request()->routeIs('juegos')">
                                {{ __('Juegos') }}
                            </x-nav-link>

                            <x-nav-link :href="route('actividadesFamilia.principal')" :active="request()->routeIs('actividadesFamilia.principal')">
                                {{ __('Actividades') }}
                            </x-nav-link>

                        @endif

                    </div>
             
            </div>
            
    

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>


              
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
           

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
  
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        
        @if (auth()->user()->idrol == 1)
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('actividades')" :active="request()->routeIs('actividades')">
                    {{ __('Actividades') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('nuevousuario')" :active="request()->routeIs('nuevousuario')">
                    {{ __('Nuevo Usuario') }}
                </x-responsive-nav-link>
            </div>

        @endif
        @if (auth()->user()->idrol == 2)        
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('juegos')" :active="request()->routeIs('juegos')">
                    {{ __('Juegos') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('actividadesFamilia.principal')" :active="request()->routeIs('actividadesFamilia.principal')">
                    {{ __('Actividades') }}
                </x-responsive-nav-link>
            </div>

        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
   
    </div>
</nav> --}}
 <nav class="bg-white border-gray-300 ">

    <div class="max-w-screen-xl flex  flex-wrap w-full items-center justify-left p-4 ">
    
      <a href="{{route('principal')}}" class="flex items-center mr-10">
          <img src="{{asset('img/Logo01-C.png')}}" class="h-10 mr-3" alt="Sadpi" />
      </a>
      
      <button data-collapse-toggle="navbar-dropdown" type="button" class=" inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-dropdown" aria-expanded="false">
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>

      
      <div class="flex flex-row hidden w-full md:block md:w-auto justify-between" id="navbar-dropdown">

        <ul class="flex flex-col justify-between font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
          @if (auth()->user()->idrol == 1)  
          <li>
            <a href="{{route('nuevousuario')}}" class="block px-4 py-2  hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2 " aria-current="page">Alta Usuarios</a>
          </li>

          <li class="">
              <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Actividades <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
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
            <a href="{{route('actividades.dashboard')}}" class="block px-4 py-2  hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Dashboard</a>
          </li>

          <ul class="flex flex-row   pl-20%  font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
            {{--  --}}
            <li class="mx-auto ">
              <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarUsuario" class="flex items-center pl-20  w-full italic py-2 pl-3 pr-4 hover:bg-gray-700 hover:text-white rounded-md font-medium  leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">{{ Auth::user()->username }} <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
              <!-- Dropdown menu -->
               <div id="dropdownNavbarUsuario" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44  ">
                  <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                    <li>
                      @csrf
                      <a href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();" class="flex flex-col justify-right block px-4 py-2 hover:bg-gray-700 hover:text-white rounded-md font-medium uppercase leading-5 text-gray-900 hover:bg-indigo-300 hover:outline-2">Salir</a>
                    </li>
                   
                  </ul>
                </div>
  
            </li>
          </ul>
          @endif
        </ul>
    
      </div>
      
    </div>
  </nav> 

  
