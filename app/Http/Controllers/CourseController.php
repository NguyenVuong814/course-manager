<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with(['lessons','enrollments'])
                        ->withCount('students');

        // tìm kiếm
        if ($request->name) {
            $query->where('name','like','%'.$request->name.'%');
        }

        if ($request->status) {
            $query->where('status',$request->status);
        }

        if ($request->min_price && $request->max_price) {
            $query->priceBetween($request->min_price,$request->max_price);
        }

        // sắp xếp
        if ($request->sort == 'price') {
            $query->orderBy('price');
        }

        if ($request->sort == 'students') {
            $query->orderByDesc('students_count');
        }

        if ($request->sort == 'date') {
            $query->latest();
        }

        $courses = $query->paginate(5);

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(CourseRequest $request)
    {
        // dùng validated cho an toàn
        $data = $request->validated();

        // tạo slug
        $data['slug'] = Str::slug($request->name);

        // upload ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);

            $data['image'] = $filename;
        }
        $student = Student::firstOrCreate(
        ['email'=>$request->email],
            [
                'name'=>$request->name,
                'phone'=>$request->phone
            ]
        );

        $student->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Thêm thành công');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, Course $course)
    {
        // dùng validated
        $data = $request->validated();

        // cập nhật slug
        $data['slug'] = Str::slug($request->name);

        // xử lý ảnh nếu có upload mới
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);

            $data['image'] = $filename;
        }

        $course->update($data);

        return redirect()->route('courses.index')->with('success','Cập nhật thành công');
    }

    public function destroy(Course $course)
    {
        $course->delete(); // soft delete
        return back()->with('success','Đã xóa');
    }

    // 🔥 thêm: danh sách đã xóa
    public function trash()
    {
        $courses = Course::onlyTrashed()->get();
        return view('courses.trash', compact('courses'));
    }

    // 🔥 thêm: khôi phục
    public function restore($id)
    {
        Course::withTrashed()->findOrFail($id)->restore();
        return back()->with('success','Khôi phục thành công');
    }
}