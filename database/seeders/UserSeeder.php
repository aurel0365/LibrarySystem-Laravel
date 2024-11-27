<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@aurel.com',
            'password' => bcrypt('adminpassword'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Pustakawan User',
            'email' => 'pustakawan@aurel.com',
            'password' => bcrypt('pustakawanpassword'),
            'role' => 'pustakawan',
        ]);
    }
}
