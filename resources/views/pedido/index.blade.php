<x-app-layout>
    <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <a href="{{route('pedido.create')}}">Novo pedido</a>

            @if(session('success'))
            <div>
                <p>{{session('success')}}</p>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @foreach($pedidos as $pedi)
                    <div class="border-b py-4">
                        <p class="font-bold">Cliente: {{ $pedi->clientes_id }}</p>
                        <p class="font-bold">Fornecedor: {{ $pedi->fornecedor_id }}</p>
                        <p class="font-bold">Quantidade: {{ $pedi->quantidade }}</p>
                        <p class="text-gray-600">Valor: {{ $pedi->valor }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>