<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pessoa') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-6 space-y-3">
            <br>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Nova Pessoa') }}
                </h2>
                <table class="table table-striped">

                </table>
            </div>
        </div>
    </div>
</x-app-layout>
