<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-6 space-y-3">
            <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div >
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Lista de Equipamentos') }}

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </h2>
                <table class="table table-dark table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th>Nome</th>
                        <th>Empresa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipamentos as $equipamento)
                            <tr>
                                <td>{{$equipamento->nome}}</td>
                                <td>{{$equipamento->empresa}}</td>
                                <td>{{$equipamento->marca}}</td>
                                <td>{{$equipamento->modelo}}</td>
                                <td style="display: flex; justify-content: end">
                                    <a href=" {{ route('equipamento.edit', $equipamento)}}">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Editar') }}
                                        </x-secondary-button>
                                    </a>
                                    <form action="{{ route('equipamento.destroy', $equipamento) }}" method="POST" style="display: inline-block;">
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
