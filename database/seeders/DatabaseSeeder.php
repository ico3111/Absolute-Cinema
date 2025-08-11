<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$6jkOHN5yBlfnw9i0vlH7kevuGyjtWvF9hGUxyVmpC4dr6/6krOCwG', //12345678
            'created_at' => '2025-08-07 13:47:38',
            'updated_at' => '2025-08-07 13:47:38'
        ]);

        $this->call([
            CategoriaSeeder::class,
            FilmeSeeder::class
        ]);
    }
}
