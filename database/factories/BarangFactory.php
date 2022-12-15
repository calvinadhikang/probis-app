<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
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
            'harga' => fake()->numberBetween(100, 99999),
            'stok' => fake()->numberBetween(0, 200),
            'merk' => fake()->numberBetween(1,75),
            'kategori' => fake()->numberBetween(1,75),
        ];
    }
}
