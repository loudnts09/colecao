<?php

namespace Database\Seeders;

use App\Models\Colecao;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Prateleira;
use App\Models\Figura;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->create([
        //     "name" => "Cuca",
        //     "email" => "cuca@gmail.com",
        //     "password" => bcrypt("2816")
        // ]);

        // User::factory(100)->create();

        // Colecao::factory()->count(50)->create();
        // Categoria::factory()->count(100)->create();
        // Prateleira::factory(150)->create();
        // Figura::factory(300)->create();
    }
}
