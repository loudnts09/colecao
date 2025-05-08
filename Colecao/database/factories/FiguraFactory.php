<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FiguraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoria_id' => rand(1, 20),
            'prateleira_id'=> rand(1,50),
            'nome'=> $this->faker->name(),
            'lancamento'=> $this->faker->date(),
            'recebimento'=> $this->faker->date(),
            'observacoes'=> $this->faker->text(),
            'foto'=> $this->faker->imageUrl(),
            
        ];
    }
}
