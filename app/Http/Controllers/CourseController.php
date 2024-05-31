<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Events\EnrollmentSuccessful;
use App\Jobs\SendReminderEmail;
use App\Mail\EnrollmentConfirmation;
use Illuminate\Support\Facades\Mail;


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

    //Display enrollment form
    public function showEnrollmentForm(Course $course)
    {
        return view('courses.enroll', compact('course'));
    }

    //Display limited guest page with courses
    public function guest()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('courses.guest', compact('courses'));
    }


    //Course enrollment validation and creation. Sends enrollment confirmation email which then is followed up by 2 separate reminders
    public function enroll(Request $request, Course $course)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $enrollment = Enrollment::create([
            'course_id' => $course->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);

        event(new EnrollmentSuccessful($course, $enrollment->email));

        //Reminders after 5 & 30 min
        SendReminderEmail::dispatch($course, $enrollment->email, 1)->delay(now()->addMinutes(5));
        SendReminderEmail::dispatch($course, $enrollment->email, 2)->delay(now()->addMinutes(30));

        return redirect()->route('courses.guest')->with('success', 'Enrollment successful');
    }

    public function show(Course $course)
    {
        $totalCourses = Course::count();
        $enrolledPeople = $course->enrollments()->paginate(10);
        return view('courses.show', compact('course', 'enrolledPeople', 'totalCourses'));
    }


}