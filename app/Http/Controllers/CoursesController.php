<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller {
    public function index() {
        $request = request()->all();

        // default sorting
        $sortBy = 'created_at';
        $sortOrder = 'desc';

        if (array_key_exists('sort', $request)) {
            global $sortBy, $sortOrder;

            $args = explode('_', $request['sort']);
            $sortBy = $args[0] === 'date' ? 'created_at' : 'title';
            $sortOrder = $args[1];
        }

        if (Auth::check()) {
            $courses = Auth::user()->courses()->orderBy($sortBy, $sortOrder)->paginate(12);
        }
        else {
            $courses = Course::orderBy($sortBy, $sortOrder)->paginate(12);
        }

        $courses->appends([
            'sort' => ($sortBy === 'created_at' ? 'date' : 'title') . '_' . $sortOrder,
            'page' => ($request['page'] ?? '1'),
        ]);

        return view('courses.courses', ['courses' => $courses]);
    }

    public function showCourse() {
        return view('courses.course_details');
    }
}
