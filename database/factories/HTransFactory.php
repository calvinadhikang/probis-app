<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HTrans>
 */
class HTransFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'total' => fake()->numberBetween(1000, 99999),
            'status' => 0,
            'created_at' => fake()->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
