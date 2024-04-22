<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'username' => 'test',
            'email' => 'rivo1266@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'phone' => '081234567890',
            'avatar' => 'avatar.png',
        ]);
    }
}
