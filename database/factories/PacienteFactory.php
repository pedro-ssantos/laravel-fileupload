<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
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
            'idade' => $this->faker->numberBetween(18, 120),
            'telefone' => $this->faker->phoneNumber(9),
            'matricula' => $this->faker->bothify('?#?##??##'),
        ];
    }
}
