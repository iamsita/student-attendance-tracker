<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['registration_number' => 'STU-2024-001', 'first_name' => 'Aarav', 'last_name' => 'Sharma', 'email' => 'aarav.sharma@student.edu', 'phone' => '9800000001', 'class_name' => 'Grade 10'],
            ['registration_number' => 'STU-2024-002', 'first_name' => 'Bina', 'last_name' => 'Thapa', 'email' => 'bina.thapa@student.edu', 'phone' => '9800000002', 'class_name' => 'Grade 10'],
            ['registration_number' => 'STU-2024-003', 'first_name' => 'Chirag', 'last_name' => 'Adhikari', 'email' => 'chirag.adhikari@student.edu', 'phone' => '9800000003', 'class_name' => 'Grade 11'],
            ['registration_number' => 'STU-2024-004', 'first_name' => 'Dipika', 'last_name' => 'Karki', 'email' => 'dipika.karki@student.edu', 'phone' => '9800000004', 'class_name' => 'Grade 11'],
            ['registration_number' => 'STU-2024-005', 'first_name' => 'Eshan', 'last_name' => 'Poudel', 'email' => 'eshan.poudel@student.edu', 'phone' => '9800000005', 'class_name' => 'Grade 12'],
            ['registration_number' => 'STU-2024-006', 'first_name' => 'Fiona', 'last_name' => 'Rai', 'email' => 'fiona.rai@student.edu', 'phone' => '9800000006', 'class_name' => 'Grade 12'],
            ['registration_number' => 'STU-2024-007', 'first_name' => 'Gaurav', 'last_name' => 'Gurung', 'email' => 'gaurav.gurung@student.edu', 'phone' => '9800000007', 'class_name' => 'Grade 9'],
            ['registration_number' => 'STU-2024-008', 'first_name' => 'Hira', 'last_name' => 'Tamang', 'email' => 'hira.tamang@student.edu', 'phone' => '9800000008', 'class_name' => 'Grade 9'],
            ['registration_number' => 'STU-2024-009', 'first_name' => 'Ishan', 'last_name' => 'Basnet', 'email' => 'ishan.basnet@student.edu', 'phone' => '9800000009', 'class_name' => 'Grade 8'],
            ['registration_number' => 'STU-2024-010', 'first_name' => 'Jyoti', 'last_name' => 'Shrestha', 'email' => 'jyoti.shrestha@student.edu', 'phone' => '9800000010', 'class_name' => 'Grade 8'],
            ['registration_number' => 'STU-2024-011', 'first_name' => 'Kiran', 'last_name' => 'Koirala', 'email' => 'kiran.koirala@student.edu', 'phone' => '9800000011', 'class_name' => 'Grade 7'],
            ['registration_number' => 'STU-2024-012', 'first_name' => 'Laxmi', 'last_name' => 'Bhandari', 'email' => 'laxmi.bhandari@student.edu', 'phone' => '9800000012', 'class_name' => 'Grade 7'],
            ['registration_number' => 'STU-2024-013', 'first_name' => 'Manish', 'last_name' => 'Pandey', 'email' => 'manish.pandey@student.edu', 'phone' => '9800000013', 'class_name' => 'Grade 6'],
            ['registration_number' => 'STU-2024-014', 'first_name' => 'Nisha', 'last_name' => 'Lama', 'email' => 'nisha.lama@student.edu', 'phone' => '9800000014', 'class_name' => 'Grade 6'],
            ['registration_number' => 'STU-2024-015', 'first_name' => 'Om', 'last_name' => 'Maharjan', 'email' => 'om.maharjan@student.edu', 'phone' => '9800000015', 'class_name' => 'Grade 5'],
            ['registration_number' => 'STU-2024-016', 'first_name' => 'Priya', 'last_name' => 'Joshi', 'email' => 'priya.joshi@student.edu', 'phone' => '9800000016', 'class_name' => 'Grade 5'],
            ['registration_number' => 'STU-2024-017', 'first_name' => 'Rajan', 'last_name' => 'Dahal', 'email' => 'rajan.dahal@student.edu', 'phone' => '9800000017', 'class_name' => 'Grade 10'],
            ['registration_number' => 'STU-2024-018', 'first_name' => 'Sabina', 'last_name' => 'Neupane', 'email' => 'sabina.neupane@student.edu', 'phone' => '9800000018', 'class_name' => 'Grade 11'],
            ['registration_number' => 'STU-2024-019', 'first_name' => 'Tilak', 'last_name' => 'Subedi', 'email' => 'tilak.subedi@student.edu', 'phone' => '9800000019', 'class_name' => 'Grade 12'],
            ['registration_number' => 'STU-2024-020', 'first_name' => 'Usha', 'last_name' => 'Ghimire', 'email' => 'usha.ghimire@student.edu', 'phone' => '9800000020', 'class_name' => 'Grade 9'],
        ];

        foreach ($students as $student) {
            Student::updateOrCreate(
                ['registration_number' => $student['registration_number']],
                array_diff_key($student, ['registration_number' => '']),
            );
        }
    }
}
