<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
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
            'name'=>$this->faker->word."subject",
            'code'=>strtoupper($this->faker->bothify('SUB###')),
            'semester'=>$this->faker->numberBetween(1,8),
        ];
    }
}
