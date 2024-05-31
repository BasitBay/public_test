<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Auth')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link:hover {
            background-color: #007bff;
            color: #fff;
        }
        body {
            background-color: #f2f2f2;
        }
        /* Custom Pagination CSS */
        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
        }
        .pagination .page-item {
            margin: 0 0.25rem;
        }
        .pagination .page-link {
            position: relative;
            display: block;
            padding: 0.375rem 0.75rem;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            text-decoration: none;
            border-radius: 0.25rem;
        }
        .pagination .page-link:hover {
            z-index: 2;
            color: #0056b3;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }
        .pagination .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
        /* Adjusting Arrow Sizes */
        .pagination .page-link svg {
            width: 1rem;
            height: 1rem;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" style="margin-left: 20%;">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('courses.index') }}">Courses</a>
                    </li>
                </ul>
                <span class="navbar-text" style="margin-right: 2%;">
                    Welcome, {{ auth()->user()->name }}
                </span>
                <a href="{{ route('logout') }}" class="btn btn-primary" style="margin-right: 2%;">Logout</a>
            </div>
        </div>
    </nav>
    <div class="nav-scroller bg-body shadow-sm" style="position: relative;">
        <nav class="nav" aria-label="Secondary navigation" style="padding-left: 20%;">
            <a class="nav-link active" aria-current="page" href="{{ route('courses.index') }}" style="font-size: large;">
                All courses
                <span class="badge text-bg-light rounded-pill align-text-bottom">{{ $totalCourses }}</span>
            </a>
            <a class="nav-link" href="{{ route('courses.create') }}" style="font-size: large;">Add new course</a>
        </nav>
    </div>
    @yield('content')
</body>
</html>
