<?php

namespace App\Http\Controllers;

use App\Models\Desejos;
use Auth;
use Illuminate\Http\Request;

class DesejosController extends Controller
{
    public function index() {
        $desejos = Desejos::with('filme')
            ->where('id_user', Auth::id())
            ->get();
    
        return view('desejos.index', [
            'desejos' => $desejos
        ]);
    }    

    public function store(Request $request) {
        $validated = $request->validate([
            'id_filme' => 'required|exists:filme,id'
        ]);
        
        Desejos::create([
            'id_filme' => $validated['nome'],
            'id_user' => Auth::user()->id
        ]);

        return redirect()->route('desejos');
    }

    public function destroy(string $id) {
        $desejo = Desejos::findOrFail($id);
        $desejo->delete();
        return redirect()->route('desejos');
    }
}
