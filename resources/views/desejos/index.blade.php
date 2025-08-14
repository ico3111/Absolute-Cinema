<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          <i class="fa-solid fa-heart"></i> &nbsp; Desejos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg ">
                <div style="background-color: #1f1f21" class="p-6 text-white justify-center">
                    <ul>
                        <div class="p-6 text-white flex flex-wrap justify-center">
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
