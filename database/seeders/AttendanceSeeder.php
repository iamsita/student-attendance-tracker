<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();

        $records = [
            ['date' => '2026-06-23', 'status' => 'present'],
            ['date' => '2026-06-24', 'status' => 'present'],
            ['date' => '2026-06-25', 'status' => 'absent'],
            ['date' => '2026-06-26', 'status' => 'present'],
            ['date' => '2026-06-27', 'status' => 'late'],
            ['date' => '2026-06-28', 'status' => 'present'],
            ['date' => '2026-06-29', 'status' => 'present'],
            ['date' => '2026-06-30', 'status' => 'present'],
            ['date' => '2026-06-17', 'status' => 'absent'],
            ['date' => '2026-06-18', 'status' => 'present'],
            ['date' => '2026-06-19', 'status' => 'late'],
            ['date' => '2026-06-20', 'status' => 'present'],
            ['date' => '2026-06-16', 'status' => 'present'],
            ['date' => '2026-06-15', 'status' => 'absent'],
            ['date' => '2026-06-14', 'status' => 'present'],
            ['date' => '2026-06-13', 'status' => 'present'],
            ['date' => '2026-06-12', 'status' => 'late'],
            ['date' => '2026-06-11', 'status' => 'present'],
            ['date' => '2026-06-10', 'status' => 'absent'],
            ['date' => '2026-06-09', 'status' => 'present'],
        ];

        foreach ($students as $index => $student) {
            $record = $records[$index];
            Attendance::updateOrCreate(
                ['student_id' => $student->id, 'attendance_date' => $record['date']],
                ['status' => $record['status']],
            );
        }
    }
}
