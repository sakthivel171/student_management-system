<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Admin::create([
            'name' => 'sakthi',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'phone'=>'9843125642',
        ]);
        Admin::create([
            'name' => 'sakthi vel',
            'email' => 'sakthi@gmail.com',
            'password' => Hash::make('password'),
            'phone'=>'9067685757',
        ]);
    }
}
