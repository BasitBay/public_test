<?php

use App\Http\Controllers\log_reg_manager;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnSelf;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [log_reg_manager::class, 'register'])->name(name: 'register');
Route::post('/register', [log_reg_manager::class, 'registerPost'])->name(name: 'register.post');
Route::get('/login', [log_reg_manager::class, 'login'])->name(name: 'login');
Route::post('/login', [log_reg_manager::class, 'loginPost'])->name(name: 'login.post');
Route::get('/logout', [log_reg_manager::class, 'logOut'])->name(name: 'logout');

Route::get('/courses', [CourseController::class, 'displayTotalCourses']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/courses', [CourseController::class, 'index'])
->middleware(['auth', 'verified'])->name('courses.index');

Route::get('/courses/create', [CourseController::class, 'create'])
->middleware(['auth', 'verified'])->name('courses.create');

Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])
->middleware(['auth', 'verified'])->name('courses.edit');

Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');

Route::get('/courses/{course}/delete', [CourseController::class, 'confirmDelete'])->name('courses.delete');

Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('/courses/guest', [CourseController::class, 'guest'])->name('courses.guest');

Route::get('/courses/{course}/enroll', [CourseController::class, 'showEnrollmentForm'])->name('courses.enroll');
Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll.submit');

Route::get('/courses/{course}', [CourseController::class, 'show'])
->middleware(['auth', 'verified'])->name('courses.show');