<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nama>
 */
class NamaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_barang' => fake()->unique()->numerify('BRG-###'),
            'nama_barang' => fake()->words(2, true),
            'merk' => fake()->words(),
            'tipe_id' => fake()->randomNumber(1, 3),
            'baik' => fake()
        ];
    }
}
