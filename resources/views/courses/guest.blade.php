@extends('layouts.layout')
@section('title', 'Courses')
@section('content')
    <div class="container" style="margin-left: 20%; width: 70%;">
        <h1 class="mb-4" style="padding-top: 20px; font-size:xx-large;">Available Courses</h1>

        @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('successMessage').style.display = 'none';
                }, 4000);
            </script>
        @endif

        @foreach($courses as $course)
            <div class="mb-4">
                <div class="course-list-item border p-4 shadow bg-white rounded">
                    <h2 class="mb-3"><strong>{{ $course->title }}</strong></h2>
                    <p class="mb-2">{{ $course->description }}</p>
                    <p class="mb-2"><strong>Price:</strong> ${{ $course->price }}</p>
                    <p class="mb-2"><strong>Participants:</strong> {{ $course->enrollments()->count() }}/{{ $course->max_participants }}</p>
                    <a href="{{ route('courses.enroll', ['course' => $course->id]) }}" class="btn btn-primary">Enroll</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection