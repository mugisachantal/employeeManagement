<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Seed the admin user with a specific hashed password.
         DB::table('employees')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'date_of_birth' => '1990-01-01',
            'sex' => 'M',
            'profile_picture' => null,
            'password' => Hash::make('adminpassword'), // Use Hash::make() here
            'salary' => 100000,
            'department_name' => 'Management',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed a few more employees using direct DB inserts
        DB::table('employees')->insert([
            [
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
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob.johnson@example.com',
                'date_of_birth' => '1988-10-22',
                'sex' => 'M',
                'profile_picture' => null,
                'password' => Hash::make('bob456'),
                'salary' => 75000,
                'department_name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Use the factory to generate a larger number of employees.  This is the preferred way.
        Employee::factory()->count(100)->create(); // Creates 20 employees with random data

        // You can also use the factory with the state
         Employee::factory()->count(5)->withHashedPassword('secret')->create();
    }
}
