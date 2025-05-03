<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // User admin, email sudah terverifikasi
        DB::table('users')->insert([
            'name' => 'Admin Putih',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // ganti dengan password aman
            'role' => 'admin',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // User biasa, email belum diverifikasi (email_verified_at null)
        DB::table('users')->insert([
            'name' => 'dapa',
            'email' => 'dapa@gmail.com',
            'email_verified_at' => null, // Belum verifikasi email
            'password' => Hash::make('dapa123'), // ganti password sesuai kebutuhan
            'role' => 'user',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
