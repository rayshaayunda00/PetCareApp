<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Super Admin
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@petcaredb.com',
            'password' => Hash::make('password'), // password: password
            'role' => 'admin_super'
        ]);

        // Admin Terbatas (hanya tambah data)
        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@petcaredb.com',
            'password' => Hash::make('password'), // password: password
            'role' => 'admin_limited'
        ]);

        // Pengguna biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@petcaredb.com',
            'password' => Hash::make('password'), // password: password
            'role' => 'user'
        ]);
    }
}
