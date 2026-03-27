<x-app-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar ao Estoque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    
                    <form action="{{ route('estoque.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="preco" class="block text-sm font-medium text-gray-700 mb-1">Preço (R$)</label>
                            <input type="number" step="0.01" name="preco" id="preco" value="{{ old('preco') }}" required 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800 sm:text-sm transition duration-150 ease-in-out">
                            @error('preco')
                                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="quantidade" class="block text-sm font-medium text-gray-700 mb-1">Quantidade</label>
                            <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') }}" required 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800 sm:text-sm transition duration-150 ease-in-out">
                            @error('quantidade')
                                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('estoque.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 transition duration-150 ease-in-out">
                                Cancelar
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Atualizar Estoque
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>