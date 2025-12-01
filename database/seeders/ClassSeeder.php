<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Department::all() as $department){
            for($year=1;$year<=4;$year++){
                foreach(['A','B'] as $section){
                    Classes::create([
                        'department_id'=>$department->id,
                        'name'=>"Year $year",
                        'section'=>$section,
                        'semester'=>$year*2-1,
                    ]);
                }
            }
        }
    }
}
