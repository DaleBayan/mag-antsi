<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Administrator',
            'username' => 'admin123',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'user_role' => 'Super Administrator',
        ]);

        \App\Models\Type::create([
            'type' => 'Song',
        ]);

        \App\Models\Type::create([
            'type' => 'Dance',
        ]);

        \App\Models\Type::create([
            'type' => 'Ritual',
        ]);

        \App\Models\UserRole::create([
            'role' => 'Super Administrator',
            'description' => 'Super Administrator',
        ]);

        \App\Models\UserRole::create([
            'role' => 'Administrator',
            'description' => 'Administrator',
        ]);

        \App\Models\UserRole::create([
            'role' => 'Content Creator',
            'description' => 'Content Creator',
        ]);
    }
}
