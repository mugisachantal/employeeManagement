<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AdministratorSeeder; // ✅ Importing the Seeders
use Database\Seeders\EmployeeSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional: Example user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call the AdministratorSeeder to seed one admin
        $this->call([
            AdministratorSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}

