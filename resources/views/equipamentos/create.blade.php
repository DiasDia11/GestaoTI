<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-6 space-y-3">
            <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Registar Equipamento') }}
                </h2>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('denied'))
                    <div class="alert alert-danger">
                        {{ session('denied') }}
                    </div>
                @endif
                <form method="post" action="{{ route('equipamento.create') }}" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                    </div>

                    <div>
                        <x-input-label for="empresa" :value="__('Empresa')" />
                        <x-text-input id="empresa" name="empresa" type="text" class="mt-1 block w-full" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('empresa')" />
                    </div>

                    <div>
                        <x-input-label for="marca" :value="__('Marca')" />
                        <x-text-input id="marca" name="marca" type="text" class="mt-1 block w-full" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('marca')" />
                    </div>

                    <div>
                        <x-input-label for="modelo" :value="__('Modelo')" />
                        <x-text-input id="modelo" name="modelo" type="text" class="mt-1 block w-full" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('modelo')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Cadastrar') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
