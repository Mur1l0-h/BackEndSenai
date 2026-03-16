<x-app-layout>
    <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('produto.create')}}">Criar produto</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
            @foreach($produto as $prod)
                    <div class="border-b py-4">
                        <p class="font-bold">Nome do Produto: {{ $prod->nome }}</p>
                        <p class="text-gray-600">Valor: {{ $prod->valor }}</p>
                    </div>
                    <div>
                        <a href="{{route('produto.edit', $prod->id)}}">Editar</a>
                        <form action="{{route('produto.destroy', $prod->id)}}" method="POST" class="inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                Excluir
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>