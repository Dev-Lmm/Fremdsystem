<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CursosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->monthName($max='now'),
            'nivel' => $this->faker->randomNumber(),
            'calificacion_final' => $this->faker->randomNumber(),
            'calificacion_actividad' => $this->faker->randomNumber(),
            'actividad' => $this->faker->streetName(),
            'maestro' => $this->faker->name(),
            'cupo' => $this->faker->numberBetween($int1 = 0, $int2 = 2147483647),
            'user_id' => $this->faker->randomNumber(),       
        ];
    }
}