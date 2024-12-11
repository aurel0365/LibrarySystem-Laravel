<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@library.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pustakawan User',
                'email' => 'pustakawan@library.com',
                'password' => Hash::make('pustakawan123'),
                'role' => 'pustakawan',
                'last_collection_update' => now()->subMonths(2), // Set tanggal pembaruan koleksi 2 bulan yang lalu
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
