<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pessoa->nome }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-6 space-y-3">
            <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form method="post" action="{{ route('pessoa.create') }}" class="mt-6 space-y-6">
                @csrf

                <div>
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" name="nome" type="text" value="{{ $pessoa->nome}}" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                </div>

                <div>
                    <x-input-label for="setor" :value="__('Setor')" />
                    <x-text-input id="setor" name="setor" type="text" value="{{ $pessoa->setor}}" class="mt-1 block w-full" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('setor')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Cadastrar') }}</x-primary-button>
                </div>
            </form>

        </div>
        <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form method="post" action="{{ route('pessoa.create') }}" class="mt-6 space-y-6">
                @csrf

                <div>
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" name="nome" type="text" value="{{ $pessoa->nome}}" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                </div>

                <div>
                    <x-input-label for="setor" :value="__('Setor')" />
                    <x-text-input id="setor" name="setor" type="text" value="{{ $pessoa->setor}}" class="mt-1 block w-full" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('setor')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Adicionar') }}</x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>