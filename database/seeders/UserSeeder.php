<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Yeni',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // admin
        ]);

        User::create([
            'name' => 'Mamah',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role_id' => 2, // user
        ]);
    }
}
