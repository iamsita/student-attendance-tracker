<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function markAttendance(Request $request)
    {
        $request->validate([
            'student_id'      => 'required|integer|exists:students,id',
            'attendance_date' => 'required|date_format:Y-m-d',
            'status'          => 'required|in:present,absent,late',
        ]);

        $attendance = Attendance::create([
            'student_id'      => $request->student_id,
            'attendance_date' => $request->attendance_date,
            'status'          => $request->status,
        ]);

        return response()->json([
            'message' => 'Attendance Marked Successfully',
            'data'    => $attendance,
        ]);
    }

    public function attendanceReport($studentId)
    {
        $attendance = Attendance::where('student_id', $studentId)
            ->orderBy('attendance_date', 'desc')
            ->get();

        return response()->json($attendance);
    }

    public function weeklySummary($studentId)
    {
        return Attendance::where('student_id', $studentId)
            ->whereBetween(
                'attendance_date',
                [now()->startOfWeek(), now()->endOfWeek()],
            )
            ->get();
    }

    public function monthlySummary($studentId)
    {
        return Attendance::where('student_id', $studentId)
            ->whereMonth('attendance_date', now()->month)
            ->get();
    }
}
