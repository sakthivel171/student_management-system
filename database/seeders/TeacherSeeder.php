<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Department::all()as $department){
            Teacher::factory()->count(5)->create([
                'department_id'=>$department->id
            ]);
        }
    }
}
