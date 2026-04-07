    @extends('layouts.master')

@section('content')

<h2>Tổng danh sách học viên</h2>

<p><b>Tổng số học viên:</b> {{ $total }}</p>

<table class="table table-bordered">
<tr>
    <th>Tên</th>
    <th>Email</th>
    <th>Số khóa học</th>
</tr>

@foreach($students as $s)
<tr>
    <td>{{ $s->name }}</td>
    <td>{{ $s->email }}</td>
    <td>{{ $s->courses_count }}</td>
</tr>
@endforeach

</table>

@endsection
