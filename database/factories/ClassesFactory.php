<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $year=$this->faker->numberBetween(1,4);
        $section=$this->faker->randomElement(['A','B']);
        $semester=$year*2-1;
        return [
            'department_id'=>Department::inRandomorder()->first()->id,
            'name'=>"Year $year",
            'section'=>$section,
            'semester'=>$semester,
        ];
    }
}
