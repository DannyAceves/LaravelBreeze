<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <!-- Matricula Generada Automaticamente -->
            <div>
                <x-label for="Matricula" :value="__('Matricula Asignada')"/>
                <input class="block mt-1 w-full" type="text" id="random" name="matricula" readonly value="<?php
                    $tesoem = 'T';
                    $caracteres = '0123456789';
                    $aleatoria = substr(str_shuffle($caracteres), 0, 8);
                    echo $tesoem . $aleatoria . "\n"; ?>">
            </div>
            <!-- Name -->
            <div>
                <x-label for="Nombre" :value="__('Nombre')" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
                <x-label for="Apellido_Paterno" :value="__('Apellido Paterno')" />
                <x-input id="a_pat" class="block mt-1 w-full" type="text" name="a_pat" :value="old('a_pat')" required autofocus />
                <x-label for="Apellido_Materno" :value="__('Apellido Materno')" />
                <x-input id="a_mat" class="block mt-1 w-full" type="text" name="a_mat" :value="old('a_mat')" required autofocus />
                <x-label for="Fecha Nac" :value="__('Fecha de Nacimiento')" />
                <x-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autofocus />
            </div>


            <!-- Contact Info -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-label for="telefono" :value="__('Numero Telefonico')" />
                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
                <x-label for="direccion" :value="__('Direccion')" />
                <textarea id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required></textarea>
                <x-label for="Cp" :value="__('CP o Zip')" />
                <x-input id="cod_postal" class="block mt-1 w-full" type="number" name="cod_postal" :value="old('cod_postal')" require/>
                
            </div>

            <!-- Password -->
            <x-label for="Tipo" :value="__('Tipo de Usuario')" />
            <select class="block mt-1 w-full" id="id_tipo" name="id_tipo" :value="old('id_tipo')" required>
                @foreach($typeusers as $typeuser)
                <option class="block mt-1 w-full" value="{{$typeuser->id_tipo}}">
                    {{$typeuser->tipo}}
                </option>
                @endforeach
            </select>

            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="foto de perfil" :value="__('Foto de Perfil')" />
                <x-input id="foto" class="block mt-1 w-full" type="file" name="foto" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya estás registrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>