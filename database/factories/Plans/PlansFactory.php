<?php

namespace Database\Factories\Plans;

use App\Models\Plans\Plans;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plans>
 */
class PlansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'sigla' => fake()->randomLetter(),
            'monto' => fake()->randomFloat(2,1,1000),
            'cantidad_u' => fake()->numberBetween(1,100),
            'lapso' => fake()->randomLetter(),
            'paypal_id' => fake()->randomNumber(5),
            'tipo' => fake()->numberBetween(1,9),
            'tipo_licencia' => fake()->randomLetter(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
