<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Mark Attendance API
    use App\Models\Attendance;
    use Illuminate\Http\Request;

    public function markAttendance(Request $request)
    {
        $attendance = Attendance::create([
            'student_id'      => $request->student_id,
            'attendance_date' => $request->attendance_date,
            'status'          => $request->status,
        ]);

        return response()->json([
            'message' => 'Attendance Marked',
            'data'    => $attendance,
        ]);
    }

    // Attendance Report API
    public function attendanceReport($studentId)
    {
        $attendance = Attendance::where(
            'student_id',
            $studentId,
        )
            ->orderBy('attendance_date', 'desc')
            ->get();

        return response()->json($attendance);
    }
}
