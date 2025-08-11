<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    admin
                    <br>
                    <a href="{{ route('filmes.create') }}">
                    <x-primary-button class="mt-5">
                        + filme
                    </x-primary-button>
                    </a>
                    <br>
                    <a href="{{ route('categorias.create') }}">
                    <x-primary-button class="mt-5">
                        + categoria
                    </x-primary-button>
                    </a>
                    <br>
                    filmes
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>sinopse</th>
                                <th>ano</th>
                                <th>Categoria</th>
                                <th>Imagem</th>
                                <th>Trailer</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filmes as $filme)
                            <tr>
                                <td>
                                    {{ $filme->nome }}
                                </td>
                                <td>
                                    {{ $filme->sinopse }}
                                </td>
                                <td>
                                    {{ $filme->ano }}
                                </td>
                                <td>
                                    {{ $filme->categoria->nome }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->titulo }}" height="50px" width="50px">
                                </td>
                                <td>
                                    <a href="{{ $filme->trailer }}">Trailer</a>
                                </td>
                                <td>
                                    <a href="{{ route('filmes.edit', $filme->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('filmes.destroy', $filme->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    categorias
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>
                                <td>
                                    {{ $categoria->nome }}
                                </td>
                                <td>
                                    <a href="{{ route('categorias.edit', $categoria->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    Usuários
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>email</th>
                                <th>isAdmin</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>
                                    {{ $usuario->name }}
                                </td>
                                <td>
                                    {{ $usuario->email }}
                                </td>
                                <td>
                                    {{ $usuario->is_admin ? 'sim' : 'não'}}
                                </td>
                                <td>
                                    <form method="post" action="{{ route('admin.profile.destroy', Auth::user()->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
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
</x-app-layout>
