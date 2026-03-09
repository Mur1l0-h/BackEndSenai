<x-app-layout>
    <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confecção') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <a href="{{route('clientes.create')}}">Novo cliente</a>

        @if(session('success'))
        <div>
            <p>{{session('success')}}</p>
        </div>
        @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @foreach($clientes as $cliente)
                    <div class="border-b py-4">
                        <p class="font-bold">{{ $cliente->nome }}</p>
                        <p class="text-gray-600">{{ $cliente->cpf }}</p>
                        <p class="text-sm italic">{{ $cliente->telefone }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>