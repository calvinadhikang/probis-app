<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake()->userName(),
            'password' => fake()->userName(),
            'nama' => fake()->name(),
            'email' => fake()->email(),
            'telepon' => fake()->phoneNumber(),
            'jenis_kelamin' => fake()->numberBetween(0,1),
            'jabatan' => fake()->numberBetween(0,1),
            'status' => fake()->numberBetween(0,1),
        ];
    }
}
