<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::post('/attendance', [AttendanceController::class, 'markAttendance']);
Route::get('/attendance-report/{studentId}', [AttendanceController::class, 'attendanceReport']);
