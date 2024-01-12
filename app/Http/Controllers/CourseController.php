<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //Retreive courses from the database by date using the Course model & send them to courses page
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('courses.index', compact('courses'));
    }

    //Retreive total number of courses to display them later in the navbar
    public function displayTotalCourses()
    {
        $totalCourses = Course::count();

        return view('layouts.course_layout', compact('totalCourses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $request->validate([
            'title' => 'required|min:2|max:256',
            'participants' => 'required|integer',
            'price' => 'nullable',
        ]);

        $course = Course::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'max_participants' => $request->input('participants'),
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }
}
