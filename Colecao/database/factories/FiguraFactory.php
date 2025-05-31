<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Prateleira;

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
            'categoria_id' => Categoria::inRandomOrder()->first()->id ?? Categoria::factory(),
            'prateleira_id' => Prateleira::inRandomOrder()->first()->id ?? Prateleira::factory(),
            'nome'=> $this->faker->name(),
            'lancamento'=> $this->faker->date(),
            'recebimento'=> $this->faker->date(),
            'observacoes'=> $this->faker->text(),
            'foto'=> $this->faker->imageUrl(),
            
        ];
    }
}
