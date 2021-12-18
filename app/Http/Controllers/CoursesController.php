<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $courses = Auth::user()->courses()->get();
        }
        else {
            $courses = Course::all();
        }

        return view('courses.courses', ['courses' => $courses]);
    }

    public function showCourse() {
        return view('courses.course_details');
    }
}
