<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $filme->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex w-1/1 bg-gray-900 p-2 rounded m-2 items-center text-justify text-sm">
                        <div class="mr-2 min-w-20rem w-1/1 ">
                            <img src="{{ $filme->imagem }}" alt="{{ $filme->nome }}" style="width: 60rem;">
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-bold text-6xl wrap">{{ $filme->nome}}</h3>
                        <div class="tags p-1">
                        <small class="border w-fit p-1/2 px-2 rounded-full">{{ $filme->categoria->nome }}</small>
                        <small class="border w-fit p-1/2 px-2 rounded-full">{{ $filme->ano }}</small>
                        </div>
                        <div class="justified">
                        <p class="max-w-max text-lg">{{ $filme->sinopse }}</p>
                        </div>
                        <br>
                        <x-primary-link href="{{ $filme->trailer }}"> Assistir ao Trailer</x-primary-link>
                        <form action="{{ route('desejos.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_filme" value="{{ $filme->id }}">
                            <button type="submit">Adicionar a lista de Desejos</button>
                        </form>
                        
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- <img src="{{ asset('storage/' . $filme->imagem) }}" alt="" height="50">