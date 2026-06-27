<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::post('/attendance', [AttendanceController::class, 'markAttendance']);
Route::get('/attendance-report/{studentId}', [AttendanceController::class, 'attendanceReport']);
Route::get('/weekly-summary/{studentId}', [AttendanceController::class, 'weeklySummary']);
Route::get('/monthly-summary/{studentId}', [AttendanceController::class, 'monthlySummary']);
