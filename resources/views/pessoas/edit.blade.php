<x-app-layout>
    <x-slot name="header">
        <div style="display: flex;justify-content:space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $pessoa->nome }}
            </h2>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </h2>
            <a href=" {{ route('pessoa.index')}}">
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
                Editar  {{ $pessoa->nome }}
            </h2>
                <br>
            <form method="POST" action="{{ route('pessoa.update',['pessoa'=> $pessoa->id]) }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" name="nome" type="text" value="{{ $pessoa->nome}}" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                </div>

                <div>
                    <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                    <x-text-input id="sobrenome" name="sobrenome" type="text" value="{{ $pessoa->sobrenome}}" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('sobrenome')" />
                </div>

                <div>
                    <x-input-label for="setor" :value="__('Setor')" />
                    <x-text-input id="setor" name="setor" type="text" value="{{ $pessoa->setor}}" class="mt-1 block w-full" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('setor')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Atualizar') }}</x-primary-button>
                </div>
            </form>

        </div>
        <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Adicionar equipamentos á  {{ $pessoa->nome }}
            </h2>

            <br>
            <form method="post" action="{{ route('pessoa.store',['pessoa'=> $pessoa->id])}}" class="mt-6 space-y-6">
                @csrf

                <div>
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" disabled name="nome" type="text" value="{{ $pessoa->nome}}" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                </div>

                <div>
                    <x-input-label for="setor" :value="__('Setor')" />
                    <x-text-input id="setor" disabled name="setor" type="text" value="{{ $pessoa->setor}}" class="mt-1 block w-full" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('setor')" />
                </div>

                <div>
                    <select name="equipamento" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Selecione o equipamento</option>
                        @foreach ($equipamentos as $equipamento)
                            <option value="{{ $equipamento->id}}">{{ $equipamento->nome}} {{$equipamento->empresa}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Adicionar') }}</x-primary-button>
                </div>
            </form>

        </div>
        <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Equipamentos Utilizados por  {{ $pessoa->nome }}
            </h2>
            <br>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Empresa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                    @if (isset($equipamentosUtilizados))
                        @foreach ($equipamentosUtilizados as $e)
                        <tr>
                            <td>{{$e->nome}}</td>
                            <td>{{$e->empresa}}</td>
                            <td>{{$e->marca}}</td>
                            <td>{{$e->modelo}}</td>
                            <td style="display: flex; justify-content: end">
                                <form action="{{ route('detach.destroy', ['equipamento'=> $e->id, 'pessoa' => $pessoa->id]) }}" method="POST" style="display: inline-block;">
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
