<?php

namespace App\Http\Controllers;

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
}
