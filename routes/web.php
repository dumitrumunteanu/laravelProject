<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PostController;
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
Route::get('/blog/new', [PostController::class, 'newPost'])->name('blog.new')->middleware('auth');
Route::get('/blog/{id?}', [PostController::class, 'showPost'])->where('id', '[0-9]+')->name('blog.show');
Route::post('/blog/new/submit', [PostController::class, 'store'])->name('post.submit');
Route::post('/blog/{id}', [CommentController::class, 'store'])->where('id', '[0-9]+')->name('comment.add');

Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
Route::post('/courses/new', [CoursesController::class, 'store'])->name('course.create')->middleware('auth');
Route::get('/courses/{id?}', [CoursesController::class, 'showCourse'])->where('id', '[0-9]+')->name('course.show')->middleware('auth');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
Route::get('/calendar/events', [CalendarController::class, 'events'])->name('events')->middleware('auth');
