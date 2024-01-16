@extends('layouts.course_layout')
@section('title', 'Courses')
@section('content')
    <div class="container" style="margin-left: 20%; width: 70%;">
        <h1 class="mb-4" style="padding-top: 20px; font-size:xx-large;">Available Courses</h1>

        @foreach($courses as $course)
            <div class="mb-4">
                <div class="course-list-item border p-4 shadow bg-white rounded">
                    <a class="nav-link" href="#"> <h2 class="mb-3"><strong>{{ $course->title }}</strong></h2></a>
                    <p class="mb-2">{{ $course->description }}</p>
                    <p class="mb-2"><strong>Price:</strong> ${{ $course->price }}</p>
                    <p class="mb-2"><strong>Participants:</strong> 0/{{ $course->max_participants }}</p>
                    <a href="{{ route('courses.edit', ['course' => $course->id]) }}" class="btn btn-primary">Edit</a> <a href="{{ route('courses.delete', ['course' => $course->id]) }}" class="btn btn-secondary">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
