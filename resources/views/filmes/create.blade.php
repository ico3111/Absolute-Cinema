<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Filme') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                <form method="POST" action="{{ route('filmes.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Nome -->
                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" class="block mt-1" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div>
                    <!-- sinopse -->
                    <div>
                        <x-input-label for="sinopse" :value="__('sinopse')" />
                        <textarea id="sinopse" class="block mt-1" type="text" name="sinopse" required autofocus autocomplete="sinopse">{{ old('sinopse') }}</textarea>
                        <x-input-error :messages="$errors->get('sinopse')" class="mt-2" />
                    </div>
                    <!-- Ano -->
                    <div>
                        <x-input-label for="ano" :value="__('ano')" />
                        <x-text-input id="ano" class="block mt-1" type="number" name="ano" :value="old('ano')" required autofocus autocomplete="ano" />
                        <x-input-error :messages="$errors->get('ano')" class="mt-2" />
                    </div>
                    <!-- imagem -->
                    <div>
                        <x-input-label for="imagem" :value="__('imagem')" />
                        <input type="file" name="imagem" id="imagem" accept="image/*">
                    </div>
                    <div>
                        <select name="id_categoria">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- trailer -->
                    <div>
                        <x-input-label for="trailer" :value="__('trailer')" />
                        <textarea id="trailer" class="block mt-1" type="text" name="trailer" required autofocus autocomplete="trailer">{{ old('trailer') }}</textarea>
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