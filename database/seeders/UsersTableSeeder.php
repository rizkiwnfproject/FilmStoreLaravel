<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => 'admin123',
                'role' => 1,  // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@example.com',
                'password' => 'user1',
                'role' => 0,  // User
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@example.com',
                'password' => 'user2',
                'role' => 0,  // User
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user3',
                'email' => 'user3@example.com',
                'password' => 'user2',
                'role' => 0,  // User
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
