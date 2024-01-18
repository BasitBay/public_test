<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //Retreive courses from the database by date using the Course model & send them to courses page
    //Retreive total number of courses to display them in the navbar
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        $totalCourses = Course::count();
    
        return view('courses.index', compact('courses', 'totalCourses'));
    }

    //Display the course creation page
    public function create()
    {
        $totalCourses = Course::count();
        return view('courses.create', compact('totalCourses'));
    }

    //Parameters for the creation form
    public function store(Request $request)
    {
        // Validation requirements
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

    //Display edit course page
    public function edit(Course $course)
    {
        $totalCourses = Course::count();
        return view('courses.edit', compact('course', 'totalCourses'));
    }

    public function update(Request $request, Course $course)
    {
        // Validation requirements
        $request->validate([
            'title' => 'required|min:2|max:256',
            'participants' => 'required|integer',
            'price' => 'nullable',
        ]);
        // Update requirements

        $course->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'max_participants' => $request->input('participants'),
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    //Display confirmation page
    public function confirmDelete(Course $course)
    {
        $totalCourses = Course::count();
        return view('courses.delete', compact('course', 'totalCourses'));
    }

    //Delete course function
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }

}
