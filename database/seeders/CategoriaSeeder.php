<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nome' => 'ação',
        ]);
        Categoria::create([
            'nome' => 'terror',
        ]);
        Categoria::create([
            'nome' => 'aventura',
        ]);
        Categoria::create([
            'nome' => 'drama',
        ]);
        Categoria::create([
            'nome' => 'comédia',
        ]);
        Categoria::create([
            'nome' => 'histórico',
        ]);
        Categoria::create([
            'nome' => 'ficção',
        ]);
        Categoria::create([
            'nome' => 'documentário',
        ]);
    }
}
