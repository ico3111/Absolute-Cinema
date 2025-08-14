<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <i class="fa-solid fa-heart"></i> &nbsp; Desejos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div style="background-color: #1f1f21" class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    <ul>
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-wrap justify-center">
                        @foreach ($desejos as $desejo)
                            <div style="background-color: #0e0e0e" class="p-8 m-2 rounded w-80 text-center">
                                <p class="text-xl font-bold">{{ $desejo->filme->nome }}</p><br>
                                <form action="{{ route('desejos.destroy', $desejo->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button type="submit">Retirar da lista</x-primary-button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
