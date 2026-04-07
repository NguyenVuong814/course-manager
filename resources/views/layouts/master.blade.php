<!DOCTYPE html>
<html>
<head>
    <title>Course Manager</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width: 220px; min-height: 100vh;">
        <h4>MENU</h4>
        <ul class="nav flex-column">
            <li>
                <a href="{{ route('courses.index') }}" class="nav-link text-white">
                    Danh sách
                </a>
            </li>

            <li>
                <!-- 🔥 SỬA CHỖ NÀY -->
                <a href="{{ route('enrollments.create') }}" class="nav-link text-white">
                    Đăng ký khóa học
                </a>
            </li>

            <li>
                <a href="{{ route('enrollments.all') }}" class="nav-link text-white">
                    Danh sách học viên
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard') }}" class="nav-link text-white">
                    Thống kê
                </a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="p-4 w-100">

        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>
</div>

</body>
</html>