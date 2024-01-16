@extends('layouts.course_layout')

@section('content')
    <div class="container" style="margin-left: 20%; width: 70%;">
        <h1 class="mb-4" style="padding-top: 20px; font-size:xx-large;">Confirm Deletion?</h1>
        <p style="padding-left: 3px;">Are you sure you want to delete the course "{{ $course->title }}"?</p>
            <form action="{{ route('courses.destroy', $course->id) }}" method="post">
            @csrf
            @method('delete')
                <div class="mb-4">
                    <div class="course-list-item border p-4 shadow bg-white rounded">
                        <a class="nav-link" href="#"> <h2 class="mb-3"><strong>{{ $course->title }}</strong></h2></a>
                        <p class="mb-3">{{ $course->description }}</p>
                        <p class="mb-3"><strong>Price:</strong> ${{ $course->price }}</p>
                        <p class="mb-2"><strong>Participants:</strong> 0/{{ $course->max_participants }}</p>
                    </div>
                    <div style="padding-top: 3%;"> <button type="submit" class="btn btn-primary">Confirm deletion</button> 
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a></div>
                </div>
            </form>
    </div>
@endsection