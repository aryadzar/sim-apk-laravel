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

        foreach (range(1, 50) as $index) {
            DB::table('pesawat')->insert([
                'no_registrasi' => strtoupper($faker->unique()->bothify('??-####')),
                'foto_pesawat' => $faker->imageUrl(640, 480, 'airplane', true, 'Faker'),
                'nama_maskapai' => $faker->randomElement(['Garuda Indonesia', 'Lion Air', 'AirAsia', 'Sriwijaya Air', 'Citilink']),
                'tipe_pesawat' => $faker->randomElement(['Boeing 737', 'Airbus A320', 'Boeing 777', 'Airbus A330']),
                'jenis_pesawat' => $faker->randomElement(['Penumpang', 'Kargo']),
                'kapasitas_penumpang' => $faker->numberBetween(100, 300),
                'created_at' => now(),
                'updated_at' => now(),
            ]);}
    }
}
