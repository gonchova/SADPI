<x-guest-layout>
    <x-auth-card class="pt-40">
        <x-slot name="logo">
            <div class="h-30 w-12 mx-auto">
                <x-application-logo />
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Ingrese su email y le enviaremos un link para resertearlo.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="container flex items-center mt-2">

                 <div class="flex-row"> 

                    <x-button class="px-2 py-2" >
                        {{ __('Enviar Email con Link') }}
                    </x-button>
                    
                    <x-button type="button" class="px-2 mt-1 sm:mt-4 py-2" onclick=" window.location='{{ url('login') }}' ">
                        {{ __('Volver') }}
                    </x-button>

                 </div>

            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
