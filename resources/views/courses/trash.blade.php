<h2>Khóa học đã xóa</h2>

@foreach($courses as $course)
    <p>
        {{ $course->name }}
        <form action="{{ route('courses.restore', $course->id) }}" method="POST">
            @csrf
            <button type="submit">Khôi phục</button>
        </form>
    </p>
@endforeach