<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Administrator>
 */
class AdministratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_of_birth' => $this->faker->date(),
            'sex' => $this->faker->randomElement(['M', 'F', null]),
            'profile_picture' => $this->faker->imageUrl(), // Or you can use a specific image path
            'password' => Hash::make('password'), // Default hashed password.  Important!
            'salary' => $this->faker->numberBetween(30000, 100000),
            'department_name' => $this->faker->randomElement(['Sales', 'Marketing', 'HR', 'Research', 'Finance', 'Inventory', 'IT']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
