@extends('layouts.course_layout')
@section('title', 'Courses')
@section('content')
    <div class="container">
        <h1 class="mb-4" style="padding-top: 20px; font-size:xx-large;">Available Courses</h1>

        @foreach($courses as $course)
            <div class="mb-4">
                <div class="course-list-item border p-4">
                    <h2 class="mb-3"><strong>{{ $course->title }}</strong></h2>
                    <p class="mb-2">{{ $course->description }}</p>
                    <p class="mb-2"><strong>Price:</strong> ${{ $course->price }}</p>
                    <p class="mb-2"><strong>Participants:</strong> 0/{{ $course->max_participants }}</p>
                    <a href="#" class="btn btn-primary">Enroll Now</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
