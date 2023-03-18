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
            'no_barang' => fake()->unique()->numerify('NO-###'),
            'tanggal_masuk' => '2000-12-22',
            'kondisi' => fake()->randomElement(['rusak', 'kurang_baik', 'baik']),
            'status' => fake()->randomElement(['tersedia', 'dipinjam', 'pensiun']),
            'lokasi' => fake()->randomElement(['gudang', 'kelas']),
            'sumber' => fake()->word(),
            'nama_kode_barang' => fake()->randomElement(['BRG-00000', 'BRG-00001', 'BRG-00002']),
        ];
    }
}
