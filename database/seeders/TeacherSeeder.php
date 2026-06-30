<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            ['teacher_id' => 'TCH-001', 'first_name' => 'Rajesh', 'last_name' => 'Sharma', 'email' => 'rajesh.sharma@school.edu', 'phone' => '9841000001'],
            ['teacher_id' => 'TCH-002', 'first_name' => 'Sunita', 'last_name' => 'Thapa', 'email' => 'sunita.thapa@school.edu', 'phone' => '9841000002'],
            ['teacher_id' => 'TCH-003', 'first_name' => 'Prakash', 'last_name' => 'Adhikari', 'email' => 'prakash.adhikari@school.edu', 'phone' => '9841000003'],
            ['teacher_id' => 'TCH-004', 'first_name' => 'Kamala', 'last_name' => 'Poudel', 'email' => 'kamala.poudel@school.edu', 'phone' => '9841000004'],
            ['teacher_id' => 'TCH-005', 'first_name' => 'Binod', 'last_name' => 'Karki', 'email' => 'binod.karki@school.edu', 'phone' => '9841000005'],
            ['teacher_id' => 'TCH-006', 'first_name' => 'Sarita', 'last_name' => 'Rai', 'email' => 'sarita.rai@school.edu', 'phone' => '9841000006'],
            ['teacher_id' => 'TCH-007', 'first_name' => 'Dipak', 'last_name' => 'Gurung', 'email' => 'dipak.gurung@school.edu', 'phone' => '9841000007'],
            ['teacher_id' => 'TCH-008', 'first_name' => 'Anita', 'last_name' => 'Tamang', 'email' => 'anita.tamang@school.edu', 'phone' => '9841000008'],
            ['teacher_id' => 'TCH-009', 'first_name' => 'Suresh', 'last_name' => 'Basnet', 'email' => 'suresh.basnet@school.edu', 'phone' => '9841000009'],
            ['teacher_id' => 'TCH-010', 'first_name' => 'Mina', 'last_name' => 'Shrestha', 'email' => 'mina.shrestha@school.edu', 'phone' => '9841000010'],
            ['teacher_id' => 'TCH-011', 'first_name' => 'Nabin', 'last_name' => 'Koirala', 'email' => 'nabin.koirala@school.edu', 'phone' => '9841000011'],
            ['teacher_id' => 'TCH-012', 'first_name' => 'Puja', 'last_name' => 'Bhandari', 'email' => 'puja.bhandari@school.edu', 'phone' => '9841000012'],
            ['teacher_id' => 'TCH-013', 'first_name' => 'Rajan', 'last_name' => 'Pandey', 'email' => 'rajan.pandey@school.edu', 'phone' => '9841000013'],
            ['teacher_id' => 'TCH-014', 'first_name' => 'Sushila', 'last_name' => 'Lama', 'email' => 'sushila.lama@school.edu', 'phone' => '9841000014'],
            ['teacher_id' => 'TCH-015', 'first_name' => 'Bikash', 'last_name' => 'Maharjan', 'email' => 'bikash.maharjan@school.edu', 'phone' => '9841000015'],
            ['teacher_id' => 'TCH-016', 'first_name' => 'Rekha', 'last_name' => 'Joshi', 'email' => 'rekha.joshi@school.edu', 'phone' => '9841000016'],
            ['teacher_id' => 'TCH-017', 'first_name' => 'Santosh', 'last_name' => 'Dahal', 'email' => 'santosh.dahal@school.edu', 'phone' => '9841000017'],
            ['teacher_id' => 'TCH-018', 'first_name' => 'Urmila', 'last_name' => 'Neupane', 'email' => 'urmila.neupane@school.edu', 'phone' => '9841000018'],
            ['teacher_id' => 'TCH-019', 'first_name' => 'Ganesh', 'last_name' => 'Subedi', 'email' => 'ganesh.subedi@school.edu', 'phone' => '9841000019'],
            ['teacher_id' => 'TCH-020', 'first_name' => 'Babita', 'last_name' => 'Ghimire', 'email' => 'babita.ghimire@school.edu', 'phone' => '9841000020'],
        ];

        foreach ($teachers as $teacher) {
            Teacher::updateOrCreate(
                ['teacher_id' => $teacher['teacher_id']],
                array_diff_key($teacher, ['teacher_id' => '']),
            );
        }
    }
}
