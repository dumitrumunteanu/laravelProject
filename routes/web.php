<?php

use App\Http\Controllers\api\PostApiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/new', [PostController::class, 'newPost'])->name('blog.new')->middleware('auth');
Route::get('/blog/{id?}', [PostController::class, 'showPost'])->where('id', '[0-9]+')->name('blog.show');
Route::post('/blog/new/submit', [PostController::class, 'store'])->name('post.submit');
Route::post('/blog/{id}', [CommentController::class, 'store'])->where('id', '[0-9]+')->name('comment.add');

Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/{id?}', [CourseController::class, 'showCourse'])->where('id', '[0-9]+')->name('course.show')->middleware('auth');
Route::post('/courses/new', [CourseController::class, 'store'])->name('course.create')->middleware('auth');
Route::post('/course/{courseId}/remove-user/{userId}', [CourseController::class, 'removeUser'])->name('course.unenrollUser')->middleware('auth');

Route::post('/courses/{id}/new-task', [TaskController::class, 'store'])->where('id', '[0-9]+')->name('task.create');
Route::post('/courses/{courseId?}/remove-task/{taskId}', [TaskController::class, 'delete'])->name('task.delete');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send')->middleware('log.activity:sendContactUs');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
Route::get('/calendar/events', [CalendarController::class, 'events'])->name('events')->middleware('auth');
Route::post('/calendar/events/add', [EventController::class, 'store'])->name('events.add');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::post('/settings/update-image', [SettingsController::class, 'update'])->name('update.profile');

Route::get('/api/blog/most-popular', [PostApiController::class, 'readMostPopularArticles']);
Route::put('/api/posts/{articleId}', [PostApiController::class, 'update']);
