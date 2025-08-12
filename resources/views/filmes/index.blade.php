<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Filmes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    <form action="{{ route('dashboard') }}" method="get" class="flex gap-2 justify-center items-center">
                        <x-text-input name="ano" placeholder="Ano" value="{{ request('ano') }}"/>
                        
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
                <div class="galeria flex flex-wrap mt-2 justify-center">
                    @foreach ($filmes as $filme)
                    <div class="flex w-1/3 bg-gray-900 p-2 rounded m-2 items-center text-justify text-sm">
                        <div class="mr-2 min-w-20rem w-1/1 ">
                            <img src="{{ $filme->imagem }}" alt="{{ $filme->nome }}" style="width: 80rem">
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-bold text-xl wrap">{{ $filme->nome}}</h3>
                        <div class="tags p-1">
                        <small class="border w-fit p-1/2 px-2 rounded-full">{{ $filme->categoria->nome }}</small>
                        <small class="border w-fit p-1/2 px-2 rounded-full">{{ $filme->ano }}</small>
                        </div>
                        <div class="sinopse h-1/2 justified overflow-hidden text-ellipsis">
                        <p class="max-w-max" style="height:5rem;overflow: hidden; text-overflow:ellipsis;">{{ $filme->sinopse }}</p>...
                        </div>
                        <br>
                         <x-primary-link href='{{ route("filmes.show", $filme->id) }}' >vizualização detalhada</x-primary-link> 
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
