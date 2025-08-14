<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Desejos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    Desejos
                    <ul>
                        @foreach ($desejos as $desejo)
                        <li>
                            {{ $desejo->filme->nome }} | 
                            <form action="{{ route('desejos.destroy', $desejo->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Retirar da lista</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
