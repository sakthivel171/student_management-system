<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departments=[
             ['name' => 'Computer Science and Engineering', 'code' => 'CSE'],
            ['name' => 'Electronics and Communication Eng.', 'code' => 'ECE'],
            ['name' => 'Mechanical Engineering', 'code' => 'MECH'],
            ['name' => 'Civil Engineering', 'code' => 'CIVIL'],
            ['name' => 'Information Technology', 'code' => 'IT'],
            ['name' => 'AI & Data Science', 'code' => 'AIDS'],

            ];
        return $this->faker->unique()->randomElement($departments);
    }
}
