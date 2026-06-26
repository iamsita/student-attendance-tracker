<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::post('/attendance', [AttendanceController::class, 'markAttendance']);

Route::get('/attendance-report/{studentId}', [AttendanceController::class, 'attendanceReport']);

Route::get('/weekly-summary/{studentId}', [AttendanceController::class, 'weeklySummary']);

Route::get('/monthly-summary/{studentId}', [AttendanceController::class, 'monthlySummary']);
