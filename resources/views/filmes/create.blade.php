<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Adicionar Filme') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <div style="background-color: #1f1f21" class="overflow-hidden shadow-sm sm:rounded-lg w-fit flex justify-center align-center m-auto">
                <div class="p-6 text-white  ">
                    
                <form method="POST" action="{{ route('filmes.store') }}" enctype="multipart/form-data" class="justify-center" >
                    @csrf
                    <!-- Nome -->
                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div> <br>
                    <!-- sinopse -->
                    <div>
                        <x-input-label for="sinopse" :value="__('Sinopse')" />
                        <x-textarea id="sinopse" class="block mt-1 w-full" type="text" name="sinopse" required autofocus autocomplete="sinopse">{{ old('sinopse') }}</x-textarea>
                        <x-input-error :messages="$errors->get('sinopse')" class="mt-2" />
                    </div> <br>
                    <!-- Ano -->
                    <div>
                        <x-input-label for="ano" :value="__('Ano')" />
                        <x-text-input id="ano" class="block mt-1 w-full" type="number" name="ano" :value="old('ano')" required autofocus autocomplete="ano" />
                        <x-input-error :messages="$errors->get('ano')" class="mt-2" />
                    </div> <br>
                    <!-- imagem -->
                    <div>
                        <x-input-label for="imagem" :value="__('Imagem')"/>
                        <x-file-input type="file" name="imagem" id="imagem" accept="image/*" />
                    </div> <br>
                    <div>
                        <x-select name="id_categoria">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </x-select>
                    </div> <br>
                    <!-- trailer -->
                    <div>
                        <x-input-label for="trailer" :value="__('Trailer')" />
                        <x-textarea id="trailer" class="block mt-1 w-full" type="text" name="trailer" required autofocus autocomplete="trailer">{{ old('trailer') }}</x-textarea>
                        <x-input-error :messages="$errors->get('trailer')" class="mt-2" />
                    </div>
                    <x-primary-button class="mt-5">
                        Submit
                    </x-primary-button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>