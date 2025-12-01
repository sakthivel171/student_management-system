<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $subjectBysem=[
              1 => ['Mathematics I', 'Physics'],
            2 => ['Mathematics II', 'Chemistry'],
            3 => ['Data Structures', 'Object Oriented Programming'],
            4 => ['DBMS', 'Computer Networks'],
            5 => ['Operating Systems', 'Web Development'],
            6 => ['Software Engineering', 'Machine Learning'],
            7 => ['Cloud Computing', 'Mobile Computing'],
            8 => ['Cyber Security', 'Artificial Intelligence'],

        ];

        foreach(Department::all() as $department)
        {
          foreach($subjectBysem as $sem=> $subjects){
            foreach($subjects as $index=> $name){
                Subject::create([
                    'department_id'=>$department->id,
                    'name'=>$name,
                    'code'=>strtoupper($department->code)."S".$sem.($index+1),
                    'semester'=>$sem,
                ]);
            }
          }
        }
    }
}
