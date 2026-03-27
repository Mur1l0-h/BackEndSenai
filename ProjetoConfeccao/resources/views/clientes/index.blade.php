<x-app-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 px-4 py-3 leading-normal text-green-700 bg-green-50 rounded-lg border border-green-200" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="mb-4 flex justify-end">
                <a href="{{ route('clientes.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    + Novo Cliente
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="divide-y divide-gray-100">
                        @foreach($clientes as $cliente)
                            <div class="flex items-center justify-between py-4 hover:bg-gray-50 transition duration-150 ease-in-out -mx-6 px-6">
                                <div class="flex flex-col">
                                    <p class="text-lg font-medium text-gray-900">{{ $cliente->nome }}</p>
                                    <p class="text-sm text-gray-500 mt-1">{{ $cliente->cpf }} <span class="mx-2">•</span> {{ $cliente->telefone }}</p>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900 transition duration-150 ease-in-out">
                                        Editar
                                    </a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline m-0 p-0">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="text-sm font-medium text-red-500 hover:text-red-800 transition duration-150 ease-in-out" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        
                        @if($clientes->isEmpty())
                            <div class="py-6 text-center text-gray-500">
                                Nenhum cliente cadastrado ainda.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>