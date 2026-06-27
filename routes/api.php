<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::post('/attendance', [AttendanceController::class, 'markAttendance']);
Route::get('/attendance-report/{studentId}', [AttendanceController::class, 'attendanceReport']);
Route::get('/weekly-summary/{studentId}', [AttendanceController::class, 'weeklySummary']);
Route::get('/monthly-summary/{studentId}', [AttendanceController::class, 'monthlySummary']);

// students list, students  store, students/{id} show, students/{id} update, students/{id} delete
Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::put('students/{id}', [StudentController::class, 'update']);
Route::delete('students/{id}', [StudentController::class, 'destroy']);
