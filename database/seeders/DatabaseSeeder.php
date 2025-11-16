<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@tradelink.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Create regular test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 5 sample users
        User::factory()->create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Michael Brown',
            'email' => 'michael@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Emily Davis',
            'email' => 'emily@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'David Wilson',
            'email' => 'david@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
