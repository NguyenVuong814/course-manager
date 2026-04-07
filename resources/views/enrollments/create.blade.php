@extends('layouts.master')

@section('content')

<div class="container" style="max-width: 600px;">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Đăng ký khóa học</h4>
        </div>

        <div class="card-body">

            {{-- thông báo --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- lỗi --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('enrollments.store') }}">
                @csrf

                {{-- tên --}}
                <div class="mb-3">
                    <label class="form-label">Tên học viên</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" placeholder="Nhập tên...">
                </div>

                {{-- email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email') }}" placeholder="Nhập email...">
                </div>

                {{-- 🔥 SĐT --}}
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone') }}" placeholder="Nhập số điện thoại...">
                </div>

                {{-- 🔥 CHỌN KHÓA HỌC --}}
                <div class="mb-3">
                    <label class="form-label">Chọn khóa học</label>

                    <select name="course_id" class="form-control">
                        <option value="">-- Chọn khóa học --</option>

                        @foreach($courses as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->name }} ({{ number_format($c->price) }}đ)
                            </option>
                        @endforeach

                    </select>
                </div>

                <button class="btn btn-success w-100">
                    Đăng ký ngay
                </button>

            </form>

        </div>
    </div>

</div>

@endsection