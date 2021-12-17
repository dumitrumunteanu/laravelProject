<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        return view('courses.courses');
    }

    public function showCourse() {
        return view('courses.course_details');
    }
}
