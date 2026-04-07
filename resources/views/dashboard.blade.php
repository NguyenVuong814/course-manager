@extends('layouts.master')

@section('content')

<h2>Dashboard</h2>

<div class="row">

<div class="col-md-3">
    <div class="card bg-primary text-white p-3">
        Tổng khóa học: {{ $totalCourses }}
    </div>
</div>

<div class="col-md-3">
    <div class="card bg-success text-white p-3">
        Tổng học viên: {{ $totalStudents }}
    </div>
</div>

<div class="col-md-3">
    <div class="card bg-warning text-white p-3">
        Doanh thu: {{ $totalRevenue }}
    </div>
</div>

</div>

<h4 class="mt-4">Khóa học hot</h4>
<p>{{ $topCourse->name ?? '' }}</p>

@endsection