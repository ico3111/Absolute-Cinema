<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $filme->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="background-color: #1f1f21"class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <div class="flex w-1/1 p-2 rounded m-2 text-justify text-sm text-top">
                        <div class="mr-2 min-w-20rem w-1/1 ">
                            <img style="width: 60rem;" src="{{ str_starts_with($filme->imagem, "http://") || str_starts_with($filme->imagem, "https://") ? $filme->imagem : asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}" >
                        </div>
                        <div class="flex flex-col justify-between">
                        <div class="ml-2">
                            <h3 class="font-bold text-6xl wrap">{{ $filme->nome}}</h3>
                            <div class="tags p-1">
                                <small class="border w-fit p-1/2 px-2 rounded-full">{{ $filme->categoria->nome }}</small>
                                <small class="border w-fit p-1/2 px-2 rounded-full">{{ $filme->ano }}</small>
                            </div>
                            <div>
                                <p class="max-w-max text-lg">{{ $filme->sinopse }}</p>
                            </div>
                            <br>
                            <x-primary-link href="{{ $filme->trailer }}"> Assistir ao Trailer</x-primary-link>
                            @if (Auth::user())
                                <form action="{{ route('desejos.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_filme" value="{{ $filme->id }}">
                                    <x-primary-button class="mt-2" type="submit">Adicionar à lista de desejos</x-primary-button>
                                </form>
                            @endif
                        </div>


                        @auth
                        @if(auth()->user()->is_admin == 1)
                        <div class="acoes flex gap-2 justify-end">
                            <x-primary-link href="{{ route('filmes.edit', $filme->id) }}">Editar</x-primary-link>
                            <form action="{{ route('filmes.destroy', $filme->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit">Deletar</x-primary-button>
                            </form>
                        </div>
                        @endif
                        @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>