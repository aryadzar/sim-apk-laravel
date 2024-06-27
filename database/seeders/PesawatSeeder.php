<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            // Pilih jenis pesawat secara acak
            $jenisPesawat = $faker->randomElement(['Airbus', 'Boeing']);
            // Pilih tipe pesawat berdasarkan jenis pesawat yang dipilih
            $tipePesawat = '';

            if ($jenisPesawat == 'Airbus') {
                $tipePesawat = $faker->randomElement(['A320', 'A330', 'A340', 'A350', 'A380']);
            } elseif ($jenisPesawat == 'Boeing') {
                $tipePesawat = $faker->randomElement(['737', '747', '767', '777', '787']);
            }

            // Insert data ke tabel 'pesawat'
            DB::table('pesawats')->insert([
                'no_registrasi' => strtoupper($faker->unique()->bothify('??-####')),
                'foto_pesawat' => $faker->imageUrl(640, 480, 'airplane', true, 'Faker'),
                'nama_maskapai' => $faker->randomElement(['Garuda Indonesia', 'Lion Air', 'AirAsia', 'Sriwijaya Air', 'Citilink']),
                'jenis_pesawat' => $jenisPesawat,
                'tipe_pesawat' => $tipePesawat,
                'kapasitas_penumpang' => $faker->numberBetween(100, 300),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
