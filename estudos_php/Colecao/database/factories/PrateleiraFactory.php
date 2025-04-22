<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'colecao_id' => rand(1, 10),
            'nome' => $this->faker->name(),
            'descricao' => $this->faker->text(),
        ];
    }
}
