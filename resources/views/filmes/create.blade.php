<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos &raquo; Criar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Nome -->
                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" class="block mt-1" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Preco -->
                    <div>
                        <x-input-label for="preco" :value="__('preco')" />
                        <x-text-input id="preco" class="block mt-1" type="text" name="preco" :value="old('preco')" required autofocus autocomplete="preco" />
                        <x-input-error :messages="$errors->get('preco')" class="mt-2" />
                    </div>
                    <!-- descricao -->
                    <div>
                        <x-input-label for="descricao" :value="__('descricao')" />
                        <x-textarea id="descricao" class="block mt-1" type="text" name="descricao" required autofocus autocomplete="descricao">{{ old('descricao') }}</x-textarea>
                        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                    </div>
                    <!-- imagem -->
                    <div>
                        <x-input-label for="imagem" :value="__('imagem')" />
                        <input type="file" name="imagem" id="imagem" accept="image/*">
                    </div>
                    <div>
                        <select name="categoria_id">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
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