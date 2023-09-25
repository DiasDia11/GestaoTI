<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Pessoas') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-6 space-y-3">
            <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div >
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </h2>
                <table class="table table-hover">
                    <thead>
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
                                        <button class="btn btn-outline-primary">
                                            {{ __('Editar') }}
                                        </button>
                                    </a>
                                    <form action="{{ route('pessoa.destroy', $pessoa) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="ml-3 btn btn-outline-danger">
                                            {{ __('Remover') }}
                                        </button>
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
