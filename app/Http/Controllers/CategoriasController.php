<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $filmes = Categoria::all();
        return view('categorias.index', [
            'categorias' => $filmes
        ]);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nome' => 'required|string|max:255']);
        
        Categoria::create([
            'nome' => $validated['nome']
        ]);

        return redirect()->route('admin');
    }

    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', [
            'categoria' => $categoria
        ]);
    }

    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', [
            'categoria' => $categoria
        ]);
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $validated = $request->validate(['nome' => 'required|string|max:255']);

        $categoria->update([
            'nome' => $validated['nome'],
        ]);

        return redirect()->route('admin');
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();
        return redirect()->route('admin');
    }
}