<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use File;
use Illuminate\Http\Request;
use Storage;

class FilmesController extends Controller
{
    public function index()
    {
        $query = Filme::query();

        if (!empty($_GET['categoria'])) { $query->where('id_categoria', $_GET['categoria']); }
        if (!empty($_GET['ano'])) { $query->where('ano', $_GET['ano']); }

        $filmes = $query->get();
        $categorias = Categoria::all();

        return view('filmes.index', [
            'filmes' => $filmes,
            'categorias' => $categorias
        ]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('filmes.create', [
            'categorias' => $categorias
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sinopse' => 'required|string|max:1000',
            'ano' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:avif,jpeg,png,jpg,gif|max:2048',
            'trailer' => 'nullable|url',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('filmes', 'public');
        } else {
            unset($validated['imagem']);
        }
        
        Filme::create([
            'nome' => $validated['nome'],
            'sinopse' => $validated['sinopse'],
            'ano' => $validated['ano'],
            'id_categoria' => $validated['id_categoria'],
            'imagem' => $validated['imagem'] ?? null,
            'trailer' => $validated['trailer'] ?? null,
        ]);

        return redirect()->route('dashboard');
    }

    public function show(string $id)
    {
        $filme = Filme::where("id", "=", $id)->first();
        return view('filmes.show', [
            'filme' => $filme
        ]);
    }

    public function edit(string $id)
    {
        $categorias = Categoria::all();
        $filme = Filme::findOrFail($id);
        return view('filmes.edit', [
            'filme' => $filme,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request, string $id)
    {
        $filme = Filme::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sinopse' => 'required|string|max:1000',
            'ano' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:avif,jpeg,png,jpg,gif|max:2048',
            'trailer' => 'nullable|url',
        ]);
        
        $validated['imagem'] = $request->hasFile('imagem') 
            ? $request->file('imagem')->store('filmes', 'public') 
            : $filme->imagem;

        $filme->update([
            'nome' => $validated['nome'],
            'sinopse' => $validated['sinopse'],
            'ano' => $validated['ano'],
            'id_categoria' => $validated['id_categoria'],
            'imagem' => $validated['imagem'],
            'trailer' => $validated['trailer'] ?? $filme->trailer,
        ]);


        return redirect()->route('admin');
    }

    public function destroy(string $id)
    {
        $filme = Filme::findOrFail($id);
        if ($filme->imagem) {
            Storage::disk('public')->delete($filme->imagem);
        }
        $filme->delete();
        return redirect()->route('admin');
    }
}
