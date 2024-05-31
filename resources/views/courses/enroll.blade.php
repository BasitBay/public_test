@extends('layouts.layout')

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Enroll in "{{ $course->title }}"?</h1>
                <form action="{{ route('courses.enroll', $course->id) }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        <a href="{{ route('courses.guest') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection