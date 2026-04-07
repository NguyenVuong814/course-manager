@extends('layouts.master')

@section('content')

<h2>Danh sách khóa học</h2>

<form method="GET" class="mb-3">
    <input name="name" placeholder="Tên khóa học" value="{{ request('name') }}">

    <select name="status">
        <option value="">Trạng thái</option>
        <option value="draft" {{ request('status')=='draft'?'selected':'' }}>cơ bản</option>
        <option value="published" {{ request('status')=='published'?'selected':'' }}>đầy đủ</option>
    </select>

    <input name="min_price" placeholder="Giá từ" value="{{ request('min_price') }}">
    <input name="max_price" placeholder="Đến" value="{{ request('max_price') }}">

    <button>Lọc</button>
</form>

<a href="{{ route('courses.create') }}" class="btn btn-primary mb-2">Thêm</a>

<table class="table table-bordered">
<tr>
    <th>Tên</th>
    <th>Giá</th>
    <th>Mô tả</th>
    <th>Học viên</th>
    <th>Trạng thái</th>
    <th>Ảnh</th>
    <th>Video</th>
    <th>Hành động</th>
</tr>

@foreach($courses as $c)
<tr>
    <td>{{ $c->name }}</td>

    <td>{{ number_format($c->price) }}</td>

    <td>
        {{ \Illuminate\Support\Str::limit($c->description, 50) ?? 'Chưa có mô tả' }}
    </td>

    <td>{{ $c->students_count }}</td>

    <td>
        @if($c->status == 'published')
            <span style="color:green">Đã xuất bản</span>
        @else
            <span style="color:red">Nháp</span>
        @endif
    </td>

    <td>
        @if($c->image)
            <img src="/uploads/{{ $c->image }}" width="80">
        @endif
    </td>

    <!-- 🔥 VIDEO FIX CHUẨN -->
    <td>
        @if($c->video_url)
            @php
                $url = $c->video_url;

                // lấy ID YouTube (hỗ trợ cả youtu.be và youtube.com)
                preg_match('/(youtu\.be\/|v=)([^&]+)/', $url, $matches);
                $videoId = $matches[2] ?? null;
            @endphp

            @if($videoId)
                <!-- ✅ YouTube -->
                <iframe width="150" height="90"
                    src="https://www.youtube.com/embed/{{ $videoId }}"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            @else
                <!-- ❌ Link khác -->
                <a href="{{ $url }}" target="_blank">🔗 Xem video</a>
            @endif
        @else
            Không có
        @endif
    </td>

    <td>
        <a href="{{ route('courses.edit', $c->id) }}" class="btn btn-warning btn-sm">Sửa</a>

        <a href="{{ route('enrollments.byCourse', $c->id) }}" class="btn btn-success btn-sm">
            Học viên
        </a>

        <form method="POST" action="{{ route('courses.destroy', $c->id) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Xóa</button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $courses->links() }}

@endsection