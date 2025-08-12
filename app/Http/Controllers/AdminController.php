<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $filmes = Filme::all();
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('admin.index', [
            'filmes' => $filmes,
            'categorias' => $categorias,
            'usuarios' => $usuarios
        ]);
    }

    public function destroyProfile(string $id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin');
    }

    public function promoteProfile(string $id) {
        $user = User::findOrFail($id);
    
        $user->update([
            'is_admin' => !$user->is_admin
        ]);

        return redirect()->route('admin');
    }
}
