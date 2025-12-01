<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        $class = Classes::inRandomOrder()->first();
        $department = $class->department;
        $yearNumber = (int) filter_var($class->name, FILTER_SANITIZE_NUMBER_INT);

        $batchYear = now()->year - ($yearNumber - 1);

        return [
            'class_id' => $class->id,
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('student123'),
            'phone' => $this->faker->numerify('9#########'),

            // UNIQUE Roll Number
            'roll_no' => strtoupper($department->code)
                . substr($batchYear, -2)
                . $class->section
                . $this->faker->unique()->numerify('###'),

            // UNIQUE admission number
            'admission_no' => strtoupper($department->code)
                . $this->faker->unique()->numerify('ADM###'),

            'date_of_birth' => $this->faker->dateTimeBetween('2004-01-01', '2010-12-31'),
            'address' => $this->faker->address(),

            'admission_date' => $this->faker->dateTimeBetween("$batchYear-01-01", "$batchYear-12-31"),

            'father_name' => $this->faker->name('male'),
            'mother_name' => $this->faker->name('female'),
            'father_occupation' => $this->faker->jobTitle(),
            'mother_occupation' => $this->faker->jobTitle(),
            'contact' => $this->faker->numerify('9#########'),
        ];
    }  
}
