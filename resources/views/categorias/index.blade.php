<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="background-color: #1f1f21"class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-wrap justify-center">
                    @foreach ($categorias as $categoria)
                    <div style="background-color: #0e0e0e" class="p-8 m-2 rounded w-80 text-center">
                        <p class="text-xl font-bold">{{ $categoria->nome}}</p>
                        @if (Auth::user() && Auth::user()->is_admin)
                            <br>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                                @csrf
                                @method('DELETE')    
                                <x-primary-button type="submit">Deletar</x-primary-button>
                            </form>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
