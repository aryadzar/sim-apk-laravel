<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'nip' => $faker->unique()->numerify('######'),
                'name' => $faker->name,
                'username' => $faker->unique()->userName,
                'password' => Hash::make('password'), // Password default
                'foto' => 'default.png', // Foto default, sesuaikan dengan kebutuhan Anda
                'role' => $faker->randomElement(['admin', 'teknisi', 'manager']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}
