<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
                'date_of_birth' => '1880-01-01',
                'sex' => 'M',
                'profile_picture' => null,
                'salary' => 100000,
                'department_name' => 'HR',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        DB::table('Administrators')->insert([
            'name' => 'Mugisa Joseph',
            'email' => 'mjojassen94@gmail.com',
            'date_of_birth' => '1990-01-01',
            'sex' => 'M',
            'profile_picture' => null,
            'password' => Hash::make('123'), 
            'salary' => 100000,
            'department_name' => 'HR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
    
}

