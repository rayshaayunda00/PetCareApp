<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // INI YANG KURANG
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    User::create([
        'name' => 'Admin',
        'email' => 'admin@petcaredb.com',
        'password' => Hash::make('password'), // password: password
        'role' => 'admin'
    ]);

    User::create([
        'name' => 'User Biasa',
        'email' => 'user@petcaredb.com',
        'password' => Hash::make('password'), // password: password
        'role' => 'user'
    ]);
}
}
