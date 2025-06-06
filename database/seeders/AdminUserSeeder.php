<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com', // Use a secure email for your actual admin
            'password' => Hash::make('password'), // CHANGE THIS TO A STRONG PASSWORD
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
