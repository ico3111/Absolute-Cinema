<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          <i class="fa-solid fa-user-tie"></i> &nbsp; Administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="background-color: #1f1f21" class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    
                    <div class="flex gap-2">
                    <x-primary-link href="{{ route('filmes.create') }}"> + Filme </x-primary-link>
                    <br>
                    <x-primary-link href="{{ route('categorias.create') }}"> + Categoria </x-primary-link>
                    </div>
                    
                    <br>

                    <h3 class="text-xl font-bold">Filmes</h3>
                    <table class="items-center justify-center">
                        <thead class="items-center">
                            <tr style="background-color:#7C0B0B"class="items-center">
                                <th class=" p-2 px-16">Nome</th>
                                <th>Sinopse</th>
                                <th class="px-5">Ano</th>
                                <th class="px-5">Categoria</th>
                                <th class="px-3">Imagem</th>
                                <th class="p-2">Trailer</th>
                                <th colspan="2" class="border-l border-black">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filmes as $filme)
                            <tr class="text-center border-b border-[#7C0B0B]">
                                <td style="color:#f97b7b "class="font-bold p-2 max-w-10 truncate">
                                    {{ $filme->nome }}
                                </td>
                                <td class="line-clamp-2 text-ellipsis pt-2 font-justified m-auto">
                                    {{ $filme->sinopse }}
                                </td>
                                <td class="p-2 px-5">
                                    {{ $filme->ano }}
                                </td>
                                <td>
                                    {{ $filme->categoria->nome }}
                                </td>
                                <td class="m-auto justify-center align-center max-w-10">
                                    <img style="width: full;" src="{{ str_starts_with($filme->imagem, "http://") || str_starts_with($filme->imagem, "https://") ? $filme->imagem : asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}" >
                                </td>
                                <td class="px-5">
                                    <a href="{{ $filme->trailer }}">Trailer</a>
                                </td>
                                <td class="border-l border-[#7C0B0B] p-2 ">
                                    <x-edit-link href="{{ route('filmes.edit', $filme->id) }}"><i class="fa-solid fa-pencil"></i></x-edit-link>
                                </td>
                                <td class="pr-2">
                                    <form action="{{ route('filmes.destroy', $filme->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit"><i class="fa-solid fa-trash"></i></x-primary-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="flex">
                        <div class="categorias w-1/2 mr-8">
                    <h3 class="text-xl font-bold">Categorias</h3>
                    <table class="items-center justify-center w-full mr-5">
                        <thead>
                            <tr style="background-color:#7C0B0B"class="items-center">
                                <th class=" p-2 px-16">Nome</th>
                                <th colspan="2" class="border-l border-black">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr class="text-center border-b border-[#7C0B0B]">
                                <td style="color:#7C0B0B "class="font-bold p-2 max-w-10 truncate">
                                    {{ $categoria->nome }}
                                </td>
                                
                                <td class="border-l border-[#7C0B0B]    ">
                                    <x-edit-link href="{{ route('categorias.edit', $categoria->id) }}"><i class="fa-solid fa-pencil"></i></x-edit-link>
                                </td>
                                <td class="">
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit"><i class="fa-solid fa-trash"></i></x-primary-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="users w-1/2">
                    <h3 class="text-xl font-bold">Usuários</h3>
                    <table class="items-center justify-center w-full mr-5">
                        <thead>
                            <tr style="background-color:#7C0B0B"class="items-center">
                                <th class="p-2 px-12">Nome</th>
                                <th class="p-2">email</th>
                                <th class="p-2">Administrador?</th>
                                <th colspan="2" class="border-l border-black">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr class="text-center border-b border-[#7C0B0B]">
                                <td style="color:#7C0B0B "class="font-bold p-2 max-w-10 truncate">
                                    {{ $usuario->name }}
                                </td>
                                <td class="p-2 px-5">
                                    {{ $usuario->email }}
                                </td>
                                <td class="p-2 px-5">
                                    {{ $usuario->is_admin ? 'sim' : 'não'}}
                                </td>
                                <td>
                                    <form action="{{ route('admin.profile.promote', $usuario->id) }}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit">
                                            {!! $usuario->is_admin 
                                                ? '<i class="fa-solid fa-arrow-down"></i> rebaixar' 
                                                : '<i class="fa-solid fa-arrow-up"></i> promover' !!}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('admin.profile.destroy', Auth::user()->id) }}">
                                        @csrf
                                        @method('delete')
                                        <x-primary-button type="submit"><i class="fa-solid fa-trash"></i></x-primary-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
