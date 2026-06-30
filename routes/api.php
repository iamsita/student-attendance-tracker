<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Models\Student;

//Attendance
Route::post('/attendance', [AttendanceController::class, 'markAttendance']);
Route::get('/attendance-report/{studentId}', [AttendanceController::class, 'attendanceReport']);
Route::get('/weekly-summary/{studentId}', [AttendanceController::class, 'weeklySummary']);
Route::get('/monthly-summary/{studentId}', [AttendanceController::class, 'monthlySummary']);

//Students list, students store, student/{id} show, students/{id} update, students/}{id} delete
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::put('students/{id}', [StudentController::class, 'update']);
Route::delete('students/{id}', [StudentController::class, 'destroy']);

//classes
Route::get('/classes/{id}', [ClassController::class, 'show']);
Route::put('/classes/{id}', [ClassController::class, 'update']);
Route::delete('/classes/{id}', [ClassController::class, 'destroy']);


//Teachers
Route::get('/teachers/{id}', [TeacherController::class, 'show']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);

//Admins
Route::get('/admins/{id}', [AdminController::class, 'show']);
Route::put('/admins/{id}', [AdminController::class, 'update']);
Route::delete('/admins/{id}', [AdminController::class, 'destroy']);
