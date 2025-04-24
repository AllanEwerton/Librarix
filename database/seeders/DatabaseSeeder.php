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
        // \App\Models\User::factory(10)->create();
        $this->call([
            AlunoSeeder::class,
            AutorSeeder::class,
            CategoriaSeeder::class,
            LivroSeeder::class,
            EmprestimoSeeder::class,
            ItemEmprestimoSeeder::class,
        ]);

    }
}
