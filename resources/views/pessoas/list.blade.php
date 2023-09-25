<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pessoa') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-6 space-y-3">
            <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div >
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Lista de Pessoas') }}
                </h2>
                <table class="table table-dark table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th>Nome</th>
                        <th>Setor</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pessoas as $pessoa)
                            <tr>
                                <td>{{$pessoa->nome}}</td>
                                <td>{{$pessoa->setor}}</td>
                                <td style="display: flex; justify-content: end">
                                    <a href=" {{ route('pessoa.edit', $pessoa )}}">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Editar') }}
                                        </x-secondary-button>
                                    </a>
                                    <form action="{{ route('pessoa.destroy', $pessoa) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="ml-3">
                                            {{ __('Delete Account') }}
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
