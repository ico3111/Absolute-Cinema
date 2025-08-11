<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Filmes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('dashboard') }}" method="get">
                        <input type="text" name="ano" value="{{ request('ano') }}">
                        
                        <select name="categoria">
                            <option value="">{{ __("Todas") }}</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit">Buscar</button>
                    </form>

                    @foreach ($filmes as $filme)
                    <div>
                        <p>
                        {{ $filme->id }} - {{ $filme->nome}}
                        | {{ $filme->ano }}
                        | {{ $filme->id_categoria }} - {{ $filme->categoria->nome }}
                        | <a href="{{ route("filmes.show", $filme->id) }}">vizualizaão detalhada</a> |
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
