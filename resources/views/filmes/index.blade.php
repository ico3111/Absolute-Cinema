<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          <i class="fa-solid fa-film"></i> &nbsp; Filmes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg " style="background-color: #1f1f21;">
                <div class="p-6 text-white justify-center">
                    <form class="flex flex-wrap mt-2 justify-center gap-2" action="{{ route('dashboard') }}" method="get" class="flex gap-2 justify-center items-center">
                        <x-text-input name="nome" placeholder="Nome do Filme" value="{{ request('nome') }}"/>

                        <x-text-input name="ano" type="number" placeholder="Ano" value="{{ request('ano') }}"/>
        
                        <x-select name="categoria">
                            <option value="">{{ __("Todas") }}</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </x-select>

                        <x-primary-button type="submit">Buscar</x-primary-button>
                    </form>

                    <div class="galeria flex flex-wrap mt-2 justify-center gap-2">
                        @foreach ($filmes as $filme)
                            <a href="{{ route('filmes.show', $filme->id) }}"
                            class="flex flex-col items-center bg-white border rounded-lg shadow-sm 
                                    hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700
                                    w-80 h-96 overflow-hidden"  style="background-color:#0e0e0e; border: 1px solid #7c0b0b;">
                            
                                <img class="object-cover w-full h-40"
                                    src="{{ str_starts_with($filme->imagem, 'http://') || str_starts_with($filme->imagem, 'https://') 
                                            ? $filme->imagem 
                                            : asset('storage/' . $filme->imagem) }}"
                                    alt="{{ $filme->titulo }}">

                                <div class="flex flex-col p-4 leading-normal flex-1 overflow-hidden">
                                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $filme->nome }}
                                    </h5>
                                    <div class="tags p-1">
                                    <small class="border w-fit p-1/2 px-2 rounded-full">{{ $filme->categoria->nome }}</small>
                                    <small class="border w-fit p-1/2 px-2 rounded-full">{{ $filme->ano }}</small>
                                </div>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2 text-ellipsis pt-2 font-justified m-auto">
                                        {{ $filme->sinopse }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
