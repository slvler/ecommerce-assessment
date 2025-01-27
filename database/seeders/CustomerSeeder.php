<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'john',
            "email" => "johndoe@gmail.com",
            "password" => Hash::make('password'),
        ]);

        User::create([
            'name' => 'jane',
            "email" => "janedoe@gmail.com",
            "password" => Hash::make('password'),
        ]);

        User::create([
            'name' => 'j',
            "email" => "j@gmail.com",
            "password" => Hash::make('password'),
        ]);
    }
}
