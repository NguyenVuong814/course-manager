<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // 📌 Form đăng ký
    public function create()
    {
        $courses = Course::all();
        return view('enrollments.create', compact('courses'));
    }

    // 📌 Danh sách học viên theo khóa học
    public function listByCourse($course_id)
    {
        $course = Course::with('students')->findOrFail($course_id);

        $students = $course->students;
        $total = $students->count();

        return view('enrollments.list', compact('course', 'students', 'total'));
    }

    // 📌 Danh sách tất cả học viên
    public function allStudents()
    {
        $students = Student::withCount('courses')->get();
        $total = $students->count();

        return view('enrollments.all', compact('students','total'));
    }

    // 📌 Xử lý đăng ký
    public function store(Request $request)
    {
        // 🔥 VALIDATION (cực quan trọng)
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        // 🔥 tạo hoặc lấy student
        $student = Student::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // 🔥 tránh đăng ký trùng
        $exists = Enrollment::where('course_id', $request->course_id)
            ->where('student_id', $student->id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Học viên đã đăng ký khóa học này rồi');
        }

        // 🔥 tạo enrollment
        Enrollment::create([
            'course_id' => $request->course_id,
            'student_id' => $student->id
        ]);

        return back()->with('success','Đăng ký thành công');
    }
}