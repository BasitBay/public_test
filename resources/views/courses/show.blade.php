@extends('layouts.course_layout')

@section('title', 'Course Details')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-left">
            <h1 style="padding-bottom: 2%;">Course details</h1>
            <div class="course-list-item border p-4 shadow bg-white rounded">
                <h2>{{ $course->title }}</h2>
                <p>{{ $course->description }}</p>
                <p><strong>Price:</strong> {{ $course->price }}</p>
                <p><strong>Number of available spots:</strong> {{ $course->max_participants - $course->enrollments()->count() }}</p>
            </div>
            <h2 style="padding-top: 5%; padding-bottom: 1%;">Enrolled People</h2>
            <ul class="list-group mb-4 course-list-item border p-4 shadow bg-white rounded">
                @foreach($enrolledPeople as $enrollment)
                    <li class="list-group-item">{{ $enrollment->first_name }} {{ $enrollment->last_name }}, {{ $enrollment->email }}</li>
                @endforeach
            </ul>

            <div class="d-flex justify-content-center">
                {{ $enrolledPeople->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
