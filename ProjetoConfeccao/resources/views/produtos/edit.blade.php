<x-app-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <form action="{{ route('produto.update', $produto) }}" method="POST" class="space-y-6">
                        @csrf
                        @method("PUT")
                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                            <input type="text" name="nome" id="nome" value="{{ $produto->nome }}" required 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error("nome")
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="valor" class="block text-sm font-medium text-gray-700">valor</label>
                            <input type="text" name="valor" id="valor" value="{{ $produto->valor }}" required 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error("valor")
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="flex items-center justify-end space-x-3 mt-6">
                            <a href="{{ route('produto.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Cancelar
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border shadow-sm text-sm font-medium text-white  rounded-md bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Salvar Cliente
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>