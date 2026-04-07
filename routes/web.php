<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;

Route::get('/', fn() => redirect('/courses'));


// ================= COURSE =================
Route::resource('courses', CourseController::class);

// soft delete
Route::get('/courses/trash', [CourseController::class, 'trash'])->name('courses.trash');
Route::post('/courses/{id}/restore', [CourseController::class, 'restore'])->name('courses.restore');


// ================= LESSON =================
Route::get('/courses/{course_id}/lessons', [LessonController::class, 'index'])->name('lessons.index');
Route::get('/courses/{course_id}/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
Route::post('/lessons', [LessonController::class, 'store'])->name('lessons.store');

Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
Route::put('/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');


// ================= ENROLLMENT =================
Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

// theo khóa học
Route::get('/courses/{course_id}/students', [EnrollmentController::class, 'listByCourse'])->name('enrollments.byCourse');

// tất cả học viên
Route::get('/students', [EnrollmentController::class, 'allStudents'])->name('enrollments.all');


// ================= DASHBOARD =================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');