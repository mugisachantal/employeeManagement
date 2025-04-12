<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrator;

class AdministratorSeeder extends Seeder
{
    public function run(): void
    {
        if (Administrator::count() === 0) {
            Administrator::create([
                'name' => 'Human Resource',
                'email' => 'omallaroy02@gmail.com',
                'password' => Hash::make('HR1234'), // Replace with a secure password
            ]);
        }
    }
}

