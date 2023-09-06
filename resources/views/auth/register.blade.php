<x-app-layout>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <div class="flex bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Nuevo Usuario</h2>
    </div>

  
    <x-auth-card class="mt-2">
        
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
      
        @if(Session::has('success'))
        <div class="text-green-600">
            {{Session::get('success')}}
        </div>
        @endif            
        
        <form id ="formRegister" method="POST" action="{{ route('nuevousuario') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" maxlength="20" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email"  maxlength="30"  name="email" :value="old('email')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="username" :value="__('Nombre de Usuario')" />

                <x-input id="username" class="block mt-1 w-full" type="text"  maxlength="15"  name="username" :value="old('username')" required />
            </div>

            <!-- Rol Usuario -->
            <div class="mt-2">
                <x-label for="rol" :value="__('Rol de Usuario')" />
                
                <select id="idrol" name="idrol" class="block mt-1 w-full h-10 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    
                    @foreach($roles as $rol)
                        <option id="idroloption"class="justify-content-center" value="{{$rol->idrol}}"  {{ (old('idrol') == $rol->idrol) ? 'selected' : '' }}> {{$rol->descripcion}}</option>
                    @endforeach
                    
                </select>
            </div>     
            
            <!-- Password -->
            <div class="mt-2">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-center gap-2 mt-2">
                <a href="{{ route('principal') }}">
                    <x-button type="button" id="btnVolver" class="px-2 py-2">
                        {{ __('Volver') }}
                    </x-button>
                </a>
                <x-button class="ml-4 px-2 py-2">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>


</x-app-layout>

