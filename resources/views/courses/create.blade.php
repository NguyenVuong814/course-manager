@extends('layouts.master')

@section('content')

<h2>Thêm khóa học</h2>

{{-- 🔥 Hiển thị lỗi --}}
@if($errors->any())
    <div style="color:red">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Tên khóa học</label>
    <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập tên khóa học">
</div>

<div class="mb-3">
    <label>Giá (VNĐ)</label>
    <input class="form-control" name="price" type="number" value="{{ old('price') }}" placeholder="Nhập giá">
</div>

<div class="mb-3">
    <label>Mô tả</label>
    <textarea class="form-control" name="description" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
</div>

<div class="mb-3">
    <label>Ảnh khóa học</label>
    <input type="file" class="form-control" name="image">
</div>

<div class="mb-3">
    <label>Video URL</label>
    <input 
        class="form-control" 
        name="video_url" 
        value="{{ old('video_url') }}" 
        placeholder="Nhập link video (YouTube, Vimeo...)">
</div>

<div class="mb-3">
    <label>Trạng thái</label>
    <select class="form-control" name="status">
        <option value="">-- Chọn trạng thái --</option>
        <option value="draft" {{ old('status')=='draft'?'selected':'' }}>Nháp</option>
        <option value="published" {{ old('status')=='published'?'selected':'' }}>Xuất bản</option>
    </select>
</div>

<button class="btn btn-success">Thêm khóa học</button>

</form>

@endsection