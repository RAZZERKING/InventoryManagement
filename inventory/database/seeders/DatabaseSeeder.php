<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Nama;
use App\Models\Tipe;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //tipe
        Tipe::create([
            'tipe_barang' => 'asset tetap'
        ]);
        Tipe::create([
            'tipe_barang' => 'asset habis pakai'
        ]);
        Tipe::create([
            'tipe_barang' => 'asset tetap lainnya'
        ]);

        //user
        User::create([
            'username' => 'mithrandir',
            'password' => bcrypt('1234'),
            'phone' => fake()->phoneNumber(),
            'role' => 'High Admin',
            'gender' => 'Laki-Laki',
        ]);
        User::create([
            'username' => 'orang',
            'password' => bcrypt('1234'),
            'phone' => fake()->phoneNumber(),
            'role' => 'orang',
            'gender' => 'orang'
        ]);

        //nama barang
        Nama::create(
            [
                'kode_barang' => 'BRG-00000',
                'nama_barang' => fake()->word(),
                'merk' => fake()->words(3, true),
                'tipe_id' => fake()->numberBetween(1, 3),
                'spesifikasi' => fake()->paragraphs(4, true),
            ]
        );
        Nama::create(
            [
                'kode_barang' => 'BRG-00001',
                'nama_barang' => fake()->word(),
                'merk' => fake()->words(3, true),
                'tipe_id' => fake()->numberBetween(1, 3),
                'spesifikasi' => fake()->paragraphs(4, true),
            ]
        );
        Nama::create(
            [
                'kode_barang' => 'BRG-00002',
                'nama_barang' => fake()->word(),
                'merk' => fake()->words(3, true),
                'tipe_id' => fake()->numberBetween(1, 3),
                'spesifikasi' => fake()->paragraphs(4, true),
            ]
        );
        Barang::factory(200)->create();
        // Barang::create([
        //     'no_barang' => 'NO-0003',
        //     'tanggal_masuk' => '2001-09-22',
        //     'kondisi' => 'baik',
        //     'status' => 'tersedia',
        //     'lokasi' => 'gudang',
        //     'sumber' => 'sumbangan',
        //     'nama_kode_barang' => 'BRG-00002',
        // ]);
        // Barang::create([
        //     'no_barang' => 'NO-0004',
        //     'tanggal_masuk' => '2001-09-22',
        //     'kondisi' => 'rusak',
        //     'status' => 'tersedia',
        //     'lokasi' => 'gudang',
        //     'sumber' => 'sumbangan',
        //     'nama_kode_barang' => 'BRG-00001',
        // ]);
        // Barang::create([
        //     'no_barang' => 'NO-0005',
        //     'tanggal_masuk' => '2001-09-22',
        //     'kondisi' => 'baik',
        //     'status' => 'tersedia',
        //     'lokasi' => 'gudang',
        //     'sumber' => 'sumbangan',
        //     'nama_kode_barang' => 'BRG-00002',
        // ]);
        // Barang::create([
        //     'no_barang' => 'NO-0006',
        //     'tanggal_masuk' => '2001-09-22',
        //     'kondisi' => 'rusak',
        //     'status' => 'tersedia',
        //     'lokasi' => 'gudang',
        //     'sumber' => 'sumbangan',
        //     'nama_kode_barang' => 'BRG-00000',
        // ]);
        // Barang::create([
        //     'no_barang' => 'NO-0001',
        //     'tanggal_masuk' => '2001-09-22',
        //     'kondisi' => 'baik',
        //     'status' => 'tersedia',
        //     'lokasi' => 'gudang',
        //     'sumber' => 'sumbangan',
        //     'nama_kode_barang' => 'BRG-00000',
        // ]);
        // Barang::create([
        //     'no_barang' => 'NO-0002',
        //     'tanggal_masuk' => '2001-09-22',
        //     'kondisi' => 'rusak',
        //     'status' => 'tersedia',
        //     'lokasi' => 'gudang',
        //     'sumber' => 'sumbangan',
        //     'nama_kode_barang' => 'BRG-00001',
        // ]);
    }
}
