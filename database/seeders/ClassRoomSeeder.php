<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    public function run(): void
    {
        $classes = [
            ['class_name' => 'Grade 10', 'section' => 'A', 'faculty' => 'Science'],
            ['class_name' => 'Grade 10', 'section' => 'B', 'faculty' => 'Science'],
            ['class_name' => 'Grade 10', 'section' => 'C', 'faculty' => 'Commerce'],
            ['class_name' => 'Grade 11', 'section' => 'A', 'faculty' => 'Science'],
            ['class_name' => 'Grade 11', 'section' => 'B', 'faculty' => 'Commerce'],
            ['class_name' => 'Grade 11', 'section' => 'C', 'faculty' => 'Humanities'],
            ['class_name' => 'Grade 12', 'section' => 'A', 'faculty' => 'Science'],
            ['class_name' => 'Grade 12', 'section' => 'B', 'faculty' => 'Commerce'],
            ['class_name' => 'Grade 12', 'section' => 'C', 'faculty' => 'Humanities'],
            ['class_name' => 'Grade 9', 'section' => 'A', 'faculty' => 'General'],
            ['class_name' => 'Grade 9', 'section' => 'B', 'faculty' => 'General'],
            ['class_name' => 'Grade 8', 'section' => 'A', 'faculty' => 'General'],
            ['class_name' => 'Grade 8', 'section' => 'B', 'faculty' => 'General'],
            ['class_name' => 'Grade 7', 'section' => 'A', 'faculty' => 'General'],
            ['class_name' => 'Grade 7', 'section' => 'B', 'faculty' => 'General'],
            ['class_name' => 'Grade 6', 'section' => 'A', 'faculty' => 'General'],
            ['class_name' => 'Grade 6', 'section' => 'B', 'faculty' => 'General'],
            ['class_name' => 'Grade 5', 'section' => 'A', 'faculty' => 'Primary'],
            ['class_name' => 'Grade 5', 'section' => 'B', 'faculty' => 'Primary'],
            ['class_name' => 'Grade 4', 'section' => 'A', 'faculty' => 'Primary'],
        ];

        foreach ($classes as $class) {
            ClassRoom::updateOrCreate(
                ['class_name' => $class['class_name'], 'section' => $class['section']],
                ['faculty' => $class['faculty']],
            );
        }
    }
}
