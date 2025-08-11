<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', [FilmesController::class, 'index'])->name('dashboard');

// Rotas públicas de filmes
Route::prefix('filmes')->group(function () {
    Route::get('/{id}', [FilmesController::class, 'show'])->name('filmes.show');
});

// Rotas públicas de categorias
Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriasController::class, 'index'])->name('categorias');
    Route::get('/{id}', [CategoriasController::class, 'show'])->name('categorias.show');
});

// Rotas do painel admin (precisa estar logado e ser admin)
Route::prefix('admin')->middleware(['auth', 'IsAdmin'])->group(function () {
    
    // Dashboard admin
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::delete('/admin/profile/{id}', [AdminController::class, 'destroyProfile'])->name('admin.profile.destroy');

    // Filmes
    Route::get('/filmes', [FilmesController::class, 'index'])->name('filmes.index');
    Route::get('/filmes/create', [FilmesController::class, 'create'])->name('filmes.create');
    Route::post('/filmes', [FilmesController::class, 'store'])->name('filmes.store');
    Route::get('/filmes/{id}/edit', [FilmesController::class, 'edit'])->name('filmes.edit');
    Route::put('/filmes/{id}', [FilmesController::class, 'update'])->name('filmes.update');
    Route::delete('/filmes/{id}', [FilmesController::class, 'destroy'])->name('filmes.destroy');

    // Categorias
    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{id}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
});


// Só login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
