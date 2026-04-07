<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // 📌 Danh sách lesson theo course
    public function index($course_id)
    {
        $course = Course::findOrFail($course_id);

        // lấy lesson theo course + sắp xếp theo order
        $lessons = $course->lessons()->orderBy('order')->get();

        return view('lessons.index', compact('course', 'lessons'));
    }

    // 📌 Form thêm lesson
    public function create($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('lessons.create', compact('course'));
    }

    // 📌 Lưu lesson
    public function store(Request $request)
    {
        // 🔥 VALIDATION (rất quan trọng)
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
            'content' => 'required',
            'video_url' => 'nullable|url',
            'order' => 'required|integer|min:1'
        ]);

        Lesson::create($request->all());

        return back()->with('success', 'Thêm bài học thành công');
    }

    // 📌 Form sửa
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    // 📌 Cập nhật
    public function update(Request $request, Lesson $lesson)
    {
        // 🔥 VALIDATION
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'video_url' => 'nullable|url',
            'order' => 'required|integer|min:1'
        ]);

        $lesson->update($request->all());

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    // 📌 Xóa
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return back()->with('success', 'Đã xóa bài học');
    }
}