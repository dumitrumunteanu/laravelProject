<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('courses');
    }
    else {
        return view('welcome');
    }
});

Auth::routes();

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/new', [BlogController::class, 'newPost'])->name('blog.new')->middleware('auth');
Route::get('/blog/{id?}', [BlogController::class, 'showPost'])->where('id', '[0-9]+')->name('blog.show');

Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
Route::get('/courses/details', [CoursesController::class, 'showCourse'])->name('course.show')->middleware('auth');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
