<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Classes;
use App\Models\Department;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::create([
            'name'=>'admin',
            'email'=>'admin@example.com',
            'password'=>Hash::make('admin@123'),

        ]);


      // Create Departments
        $cse = Department::create([
            'name' => 'Computer Science and Engineering',
            'code' => 'CSE',
        ]);

        $ece = Department::create([
            'name' => 'Electronics and Communication Engineering',
            'code' => 'ECE',
        ]);

    
        // Create Classes
        $cseClass1 = Classes::create([
            'department_id' => $cse->id,
            'name' => 'CSE - Year 1',
            'section' => 'A',
            'semester' => 1,
        ]);

        $cseClass2 = Classes::create([
            'department_id' => $cse->id,
            'name' => 'CSE - Year 2',
            'section' => 'A',
            'semester' => 3,
        ]);

        // Create Subjects
        $dataStructures = Subject::create([
            'department_id' => $cse->id,
            'name' => 'Data Structures',
            'code' => 'CS101',
            'semester' => 3,
        ]);

        $dbms = Subject::create([
            'department_id' => $cse->id,
            'name' => 'Database Management Systems',
            'code' => 'CS102',
            'semester' => 3,
        ]);

        $programming = Subject::create([
            'department_id' => $cse->id,
            'name' => 'Programming Fundamentals',
            'code' => 'CS001',
            'semester' => 1,
        ]);

        // Create Teachers
        $teacher1 = Teacher::create([
            'department_id' => $cse->id,
            'name' => 'Dr.vel',
            'email' => 'vel@sms.com',
            'password' => Hash::make('password'),
            'phone' => '9876543210',
            'employee_id' => 'EMP001',
            'qualification' => 'PhD in Computer Science',
            'joining_date' => '2020-01-15',
        ]);

        $teacher2 = Teacher::create([
            'department_id' => $cse->id,
            'name' => 'Prof. Sarah Johnson',
            'email' => 'sarah@sms.com',
            'password' => Hash::make('password'),
            'phone' => '9876543211',
            'employee_id' => 'EMP002',
            'qualification' => 'M.Tech in Computer Science',
            'joining_date' => '2019-08-20',
        ]);

        $teacher3 = Teacher::create([
            'department_id' => $cse->id,
            'name' => 'Dr.thiyagu',
            'email' => 'thiyagu@sms.com',
            'password' => Hash::make('password'),
            'phone' => '9876543212',
            'employee_id' => 'EMP003',
            'qualification' => 'PhD in Software Engineering',
            'joining_date' => '2021-03-10',
        ]);

        /** Create Students */
for ($i = 1; $i <= 10; $i++) {
    Student::create([
        'class_id' => $cseClass1->id,
        'admission_no' => 'SD101' . $i,
        'name' => 'sakthi ' . $i,
        'email' => 'sakthi@sms.com',
        'password' => Hash::make('password'),
        'phone' => '98765432' . str_pad($i, 2, '0', STR_PAD_LEFT),
        'roll_no' => 'CSEA00' . $i,
        'date_of_birth' => '2005-01-' . str_pad($i, 2, '0', STR_PAD_LEFT),
        'address' => 'Address ' . $i,
        'admission_date' => '2024-06-01',
        'father_name' => 'Nagarajan ' . $i,
        'mother_name' => 'Selvi ' . $i,
        'father_occupation' => 'Farmer' . $i,
        'mother_occupation' => 'Housewife',
        'contact' => '87654321' . str_pad($i, 2, '0', STR_PAD_LEFT),
    ]);
}


        // Assign Teachers to Classes with Subjects
        DB::table('class_teacher_subject')->insert([
            [
                'class_id' => $cseClass1->id,
                'teacher_id' => $teacher1->id,
                'subject_id' => $programming->id,
                'academic_year' => '2024-2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_id' => $cseClass2->id,
                'teacher_id' => $teacher2->id,
                'subject_id' => $dataStructures->id,
                'academic_year' => '2024-2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_id' => $cseClass2->id,
                'teacher_id' => $teacher3->id,
                'subject_id' => $dbms->id,
                'academic_year' => '2024-2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
