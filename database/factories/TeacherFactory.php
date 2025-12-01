<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id'=>Department::inRandomorder()->first()->id,
            'employee_id'=>$this->faker->unique()->numerify('EMP###'),
            'name'=>$this->faker->name,
            'email'=>$this->faker->unique()->safeEmail(),
            'phone'=>$this->faker->numerify('98########'),
            'qualification'=>$this->faker->randomElement(['M.Tech','PhD','M.E']),
            'password'=>Hash::make('password'),
            'joining_date'=>$this->faker->date(),

        ];
    }
}
