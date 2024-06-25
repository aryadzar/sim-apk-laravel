<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [[
            "name" => "imam_manager",
            "email" => "imam_manager@gmail.com",
            "password" => bcrypt("123"),
            "role" => "manager"
        ],
        [
            "name" => "imam_manager",
            "email" => "imam_manager@gmail.com",
            "password" => bcrypt("123"),
            "role" => "manager"
        ],
        [
            "name" => "imam_manager",
            "email" => "imam_manager@gmail.com",
            "password" => bcrypt("123"),
            "role" => "manager"
        ],
        [
            "name" => "imam_manager",
            "email" => "imam_manager@gmail.com",
            "password" => bcrypt("123"),
            "role" => "manager"
        ]
        ];

        DB::table('users')->insert($data);
    }
}
