@extends('layouts.course_layout')

@section('content')
<div class="container" style="margin-left: 20%; width: 70%;">
        <h1 class="mb-4" style="padding-top: 20px; font-size:xx-large;">Edit Course</h1>    
        <div class="create-list-item border p-4 shadow bg-white rounded" style="width: 90%;">    
            <form action="{{ route('courses.update', $course->id) }}" method="post">
                @csrf
                @method('put')
                <!-- Title Input -->
                <div class="mb-3">
                    <label for="title" class="form-label"><strong>Title</strong></label>
                    <input type="text" class="form-control" id="title" name="title" required minlength="2" maxlength="256" value="{{ $course->title }}">
                </div>

                <!-- Description Input -->
                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Description</strong></label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ $course->description }}</textarea>
                </div>

                <!-- Price Input -->
                <div class="mb-3">
                    <label for="price" class="form-label"><strong>Price</strong></label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $course->price }}" required>
                </div>

                <!-- Participants Input -->
                <div class="mb-3">
                    <label for="participants" class="form-label"><strong>Participants</strong></label>
                    <input type="number" class="form-control" id="participants" name="participants" value="{{ $course->max_participants }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection