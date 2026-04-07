@extends('layouts.master')

@section('content')

<h2>Danh sách học viên - {{ $course->name }}</h2>

<p><b>Tổng số học viên:</b> {{ $total }}</p>

<table class="table table-bordered">
<tr>
    <th>Tên</th>
    <th>Email</th>
</tr>

@foreach($students as $s)
<tr>
    <td>{{ $s->name }}</td>
    <td>{{ $s->email }}</td>
</tr>
@endforeach

</table>

@endsection