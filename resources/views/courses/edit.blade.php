@extends('layouts.master')

@section('content')

<h2>Sửa khóa học</h2>

{{-- 🔥 HIỂN THỊ LỖI --}}
@if($errors->any())
    <div style="color:red">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tên</label>
        <input class="form-control" name="name" value="{{ old('name', $course->name) }}">
    </div>

    <div class="mb-3">
        <label>Giá</label>
        <input class="form-control" type="number" name="price" value="{{ old('price', $course->price) }}">
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea class="form-control" name="description">{{ old('description', $course->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Trạng thái</label>
        <select class="form-control" name="status">
            <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>Nháp</option>
            <option value="published" {{ $course->status == 'published' ? 'selected' : '' }}>Đã xuất bản</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Ảnh</label>
        <input type="file" name="image">
    </div>

    @if($course->image)
        <div class="mb-3">
            <p>Ảnh hiện tại:</p>
            <img src="/uploads/{{ $course->image }}" width="100">
        </div>
    @endif

    <button class="btn btn-primary">Cập nhật</button>
</form>

@endsection