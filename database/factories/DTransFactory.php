<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DTrans>
 */
class DTransFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'htrans_id' => fake()->numberBetween(1,150),
            'barang_id' => fake()->numberBetween(1,150),
            'nama' => fake()->name(),
            'qty' => fake()->numberBetween(1, 100),
            'harga' => fake()->numberBetween(1, 99999),
            'subtotal' => fake()->numberBetween(1, 99999),
        ];
    }
}
