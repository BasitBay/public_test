@extends('layouts.layout')
@section('title', 'Registration')
@section('content')
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <form method="POST" action="{{route('register.post')}}" style="margin-bottom: 20%; width: 400px;">
        <div class="mt-3">
            @if($errors -> any())
                <div class="col-12">
                    @foreach($errors -> all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if (session() -> has ('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if (session() -> has ('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        @csrf
        <h1>Register below</h1>
            <div class="mb-3" style="margin-top: 10%;">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <p style="margin-top: 2%;">If you already have an account <a href="{{route('login')}}">login here</a></p>
        </form>
    </div>
@endsection