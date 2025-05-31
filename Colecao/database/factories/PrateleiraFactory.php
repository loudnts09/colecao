<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Colecao;

class PrateleiraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'colecao_id' => Colecao::inRandomOrder()->first()->id ?? Colecao::factory(),
            'nome' => $this->faker->name(),
            'descricao' => $this->faker->text(),
        ];
    }
}
