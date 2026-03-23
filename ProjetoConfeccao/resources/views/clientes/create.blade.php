<x-app-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    
                    <form action="{{ route('clientes.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800 sm:text-sm transition duration-150 ease-in-out">
                            @error('nome')
                                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">CPF</label>
                                <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required 
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800 sm:text-sm transition duration-150 ease-in-out">
                                @error('cpf')
                                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="telefone" class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" required 
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800 sm:text-sm transition duration-150 ease-in-out">
                                @error('telefone')
                                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="reserva" class="block text-sm font-medium text-gray-700 mb-1">Possui Reserva?</label>
                            <select name="reserva" id="reserva" required 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800 sm:text-sm transition duration-150 ease-in-out">
                                <option value="" disabled {{ old('reserva') === null ? 'selected' : '' }}>Selecione uma opção</option>
                                <option value="1" {{ old('reserva') == '1' ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('reserva') == '0' ? 'selected' : '' }}>Não</option>
                            </select>
                            @error('reserva')
                                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('clientes.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 transition duration-150 ease-in-out">
                                Cancelar
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Salvar Cliente
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>