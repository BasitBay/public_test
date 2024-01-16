<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Auth')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" style="margin-left: 20%;">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('courses.index')}}">Courses</a>
                    </li>
                </ul>
                <span class="navbar-text" style="margin-right: 2%;">
                    Welcome, {{auth()->user()->name}} 
                </span>
                <a href="{{route('logout')}}" class="btn btn-primary" style="margin-right: 2%;">Logout</a>
                
            </div>
        </div>
    </nav>
    <div class="nav-scroller bg-body shadow-sm" style="position: relative;">
      <nav class="nav" aria-label="Secondary navigation" style="padding-left: 20%;">
        <a class="nav-link active" aria-current="page" href="{{route('courses.index')}}" style="font-size: large;">All courses <span class="badge text-bg-light rounded-pill align-text-bottom">20</span></a>
        <a class="nav-link" href="{{route('courses.create')}}" style="font-size: large;">Add new course</a>
      </nav>
    </div>
    @yield('content')
  </body>
</html>