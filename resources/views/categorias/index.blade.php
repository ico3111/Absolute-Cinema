<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-wrap justify-center">
                    @foreach ($categorias as $categoria)
                    <div class="p-8 bg-gray-900 m-2 rounded w-80">
                        <p class="text-xl font-bold"a >{{ $categoria->nome}}</p> <br>
                        <x-primary-link href='{{ route("categorias.show", $categoria->id) }}'>vizualizaão detalhada</x-primary-link>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
