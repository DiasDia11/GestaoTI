<x-app-layout>
    <x-slot name="header">
        <div style="display: flex;justify-content:space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $equipamento->nome }} {{ $equipamento->empresa }}
            </h2>

            <a href=" {{ route('equipamento.index')}}">
                <button class="btn btn-outline-primary">
                    {{ __('Voltar') }}
                </button>
            </a>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-6 space-y-3">
            <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar  {{ $equipamento->nome }} {{ $equipamento->empresa }}
            </h2>
                <br>
                <form method="post" action="{{ route('equipamento.update',['equipamento'=> $equipamento->id]) }}" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" name="nome" value="{{$equipamento->nome}}" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                    </div>

                    <div>
                        <x-input-label for="empresa" :value="__('Empresa')" />
                        <x-text-input id="empresa" name="empresa" value="{{$equipamento->empresa}}" type="text" class="mt-1 block w-full" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('empresa')" />
                    </div>

                    <div>
                        <x-input-label for="marca" :value="__('Marca')" />
                        <x-text-input id="marca" name="marca" value="{{$equipamento->marca}}" type="text" class="mt-1 block w-full" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('marca')" />
                    </div>

                    <div>
                        <x-input-label for="modelo" :value="__('Modelo')" />
                        <x-text-input id="modelo" name="modelo" value="{{$equipamento->modelo}}" type="text" class="mt-1 block w-full" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('modelo')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Atualizar') }}</x-primary-button>
                    </div>
                </form>

        </div>
        <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pessoas Utilizando {{ $equipamento->nome }} {{ $equipamento->empresa}}
            </h2>
            <br>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Setor</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                    @if (isset($pessoas))
                        @foreach ($pessoas as $pessoa)
                        <tr>
                            <td>{{$pessoa->nome}}</td>
                            <td>{{$pessoa->sobrenome}}</td>
                            <td>{{$pessoa->setor}}</td>
                            <td style="display: flex; justify-content: end">
                                <form action="{{ route('detach.destroy', ['equipamento'=> $equipamento->id, 'pessoa' => $pessoa->id])}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-3 btn btn-outline-danger">
                                        {{ __('Remover') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
