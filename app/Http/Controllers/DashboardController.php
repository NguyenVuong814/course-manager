<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        // 📊 Tổng số khóa học
        $totalCourses = Course::count();

        // 📊 Tổng số học viên
        $totalStudents = Student::count();

        // 📊 Tổng doanh thu (giá * số học viên mỗi khóa)
        $totalRevenue = Course::withCount('students')
            ->get()
            ->sum(fn($course) => $course->price * $course->students_count);

        // 🔥 Khóa học nhiều học viên nhất
        $topCourse = Course::withCount('students')
            ->orderByDesc('students_count')
            ->first();

        // 🆕 5 khóa học mới nhất
        $latestCourses = Course::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalCourses',
            'totalStudents',
            'totalRevenue',
            'topCourse',
            'latestCourses'
        ));
    }
}