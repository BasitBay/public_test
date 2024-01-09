<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" style="margin-left: 20%;">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('courses.index')}}">Courses</a>
                    </li>
                </ul>
                <span class="navbar-text" style="margin-right: 2%;">
                    Welcome, {{auth()->user()->name}} 
                </span>
                <a href="{{route('logout')}}" class="btn btn-primary" style="margin-right: 2%;">Logout</a>
                
            </div>
        </div>
    </nav>

    
    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 25%;">
        {{ __('Dashboard') }}
    </h1>

    <div class="py-12" style="margin-left: 25%; ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
  </body>
</html>