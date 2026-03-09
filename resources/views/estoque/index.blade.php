<x-app-layout>
    <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estoque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{route('estoque.create')}}">Novo item no estoque</a>

            @if(session('success'))
            <div>
                <p>{{session('success')}}</p>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @foreach($estoque as $est)
                    <div class="border-b py-4">
                        <label for="Estoque">ID: {{ $est->id }}</label>
                        <p class="font-bold">Preço: {{ $est->preco }}</p>
                        <p class="text-gray-600">Quantidade: {{ $est->quantidade }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>