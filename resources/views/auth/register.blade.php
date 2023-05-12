<x-app-layout>
   
    <div class="flex bg-white shadow-sm sm:rounded-lg mt-2 mb-2 justify-center ">
        <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Nuevo Usuario</h2>
    </div>

    
    <x-auth-card class="mt-2">
        
        <x-slot name="logo">
            {{-- <div class="h-30 w-12 mx-auto">
                <x-application-logo />
            </div> --}}
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

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="username" :value="__('Nombre de Usuario')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            </div>

            <!-- Rol Usuario -->
            <div class="mt-4">
                <x-label for="rol" :value="__('Rol de Usuario')" />
                
                <select id="idrol" name="idrol" class="block mt-1 w-full h-10 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    
                    @foreach($roles as $rol)
                        <option id="idroloption"class="justify-content-center" value={{$rol->idrol}}>{{$rol->descripcion}}</option>
                    @endforeach
                    
                </select>
            </div>     
            
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-left mt-4">
                <a href="{{ route('principal') }}">
                    <x-button type="button" id="btnVolver">
                        {{ __('Volver') }}
                    </x-button>
                </a>
                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
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
