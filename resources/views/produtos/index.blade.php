<x-app-layout>
    <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @foreach($produto as $prod)
                    <div class="border-b py-4">
                        <p class="font-bold">Nome do Produto: {{ $prod->nome }}</p>
                        <p class="text-gray-600">Valor: {{ $prod->valor }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>