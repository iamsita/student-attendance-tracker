<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            ['admin_name' => 'Super Admin',      'email' => 'superadmin@school.edu',   'password' => Hash::make('password123')],
            ['admin_name' => 'Arjun Khatri',     'email' => 'arjun.khatri@school.edu', 'password' => Hash::make('password123')],
            ['admin_name' => 'Nisha Acharya',    'email' => 'nisha.acharya@school.edu','password' => Hash::make('password123')],
            ['admin_name' => 'Bibek Pokhrel',    'email' => 'bibek.pokhrel@school.edu','password' => Hash::make('password123')],
            ['admin_name' => 'Sita Baral',       'email' => 'sita.baral@school.edu',   'password' => Hash::make('password123')],
            ['admin_name' => 'Manoj Upreti',     'email' => 'manoj.upreti@school.edu', 'password' => Hash::make('password123')],
            ['admin_name' => 'Ritu Shrestha',    'email' => 'ritu.shrestha@school.edu','password' => Hash::make('password123')],
            ['admin_name' => 'Deepak Bhatt',     'email' => 'deepak.bhatt@school.edu', 'password' => Hash::make('password123')],
            ['admin_name' => 'Kavita Rijal',     'email' => 'kavita.rijal@school.edu', 'password' => Hash::make('password123')],
            ['admin_name' => 'Roshan Magar',     'email' => 'roshan.magar@school.edu', 'password' => Hash::make('password123')],
            ['admin_name' => 'Priya Dhakal',     'email' => 'priya.dhakal@school.edu', 'password' => Hash::make('password123')],
            ['admin_name' => 'Naresh Limbu',     'email' => 'naresh.limbu@school.edu', 'password' => Hash::make('password123')],
            ['admin_name' => 'Smriti Karmachar', 'email' => 'smriti.karmachar@school.edu','password' => Hash::make('password123')],
            ['admin_name' => 'Anil Gautam',      'email' => 'anil.gautam@school.edu',  'password' => Hash::make('password123')],
            ['admin_name' => 'Menuka Oli',       'email' => 'menuka.oli@school.edu',   'password' => Hash::make('password123')],
            ['admin_name' => 'Sujan Rai',        'email' => 'sujan.rai@school.edu',    'password' => Hash::make('password123')],
            ['admin_name' => 'Anju Tamang',      'email' => 'anju.tamang@school.edu',  'password' => Hash::make('password123')],
            ['admin_name' => 'Hemant Chaudhary', 'email' => 'hemant.chaudhary@school.edu','password' => Hash::make('password123')],
            ['admin_name' => 'Sabina Thapa',     'email' => 'sabina.thapa@school.edu', 'password' => Hash::make('password123')],
            ['admin_name' => 'Lokesh Panta',     'email' => 'lokesh.panta@school.edu', 'password' => Hash::make('password123')],
        ];

        foreach ($admins as $admin) {
            Admin::updateOrCreate(
                ['email' => $admin['email']],
                ['admin_name' => $admin['admin_name'], 'password' => $admin['password']],
            );
        }
    }
}
