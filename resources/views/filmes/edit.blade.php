<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Filme') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-1/2">
            <div style="background-color: #1f1f21" class="overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class=" text-white">
                    
                    <form method="POST" action="{{ route('filmes.update', $filme->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nome -->
                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" 
                                :value="old('nome', $filme->nome)" required autofocus autocomplete="nome" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Sinopse -->
                        <div>
                            <x-input-label for="sinopse" :value="__('Sinopse')" />
                            <x-textarea id="sinopse" class="block mt-1 w-full" name="sinopse" required autofocus autocomplete="sinopse">{{ old('sinopse', $filme->sinopse) }}</x-textarea>
                            <x-input-error :messages="$errors->get('sinopse')" class="mt-2" />
                        </div>

                        <!-- Ano -->
                        <div>
                            <x-input-label for="ano" :value="__('Ano')" />
                            <x-text-input id="ano" class="block mt-1 w-full" type="number" name="ano" 
                                :value="old('ano', $filme->ano)" required autofocus autocomplete="ano" />
                            <x-input-error :messages="$errors->get('ano')" class="mt-2" />
                        </div>

                        <!-- Imagem -->
                        <div>
                            <x-input-label for="imagem" :value="__('Imagem')" />
                            @if($filme->imagem)
                                <div class="mb-2">
                                <img style="height:15rem" src="{{ str_starts_with($filme->imagem, "http://") || str_starts_with($filme->imagem, "https://") ? $filme->imagem : asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}" >
                                </div>
                            @endif
                            <x-file-input type="file" name="imagem" id="imagem" accept="image/*" />
                        </div>

                        <!-- Categoria -->
                        <div>
                            <x-input-label for="id_categoria" :value="__('Categoria')" />
                            <x-select name="id_categoria" id="id_categoria" class="w-full">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" 
                                        {{ old('id_categoria', $filme->id_categoria) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>

                        <!-- Trailer -->
                        <div>
                            <x-input-label for="trailer" :value="__('Trailer')" />
                            <x-textarea id="trailer" class="block mt-1 w-full" name="trailer" required autofocus autocomplete="trailer">{{ old('trailer', $filme->trailer) }}</x-textarea>
                            <x-input-error :messages="$errors->get('trailer')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-5">
                            Atualizar
                        </x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
