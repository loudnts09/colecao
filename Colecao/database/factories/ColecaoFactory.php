<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColecaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'descricao'=> $this->faker->text(),
        ];
    }
}
