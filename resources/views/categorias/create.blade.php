<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Adicionar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="background-color:#1f1f21" class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    
                <form method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Nome -->
                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" class="block mt-1" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
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