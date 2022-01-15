<?php

namespace App\Http\Controllers;

use App\Http\Request\CourseRequest;
use App\Models\Course;
use App\Services\CourseCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller {
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

    public function store(CourseRequest $request, CourseCreator $creator) {
        $data = $request->validated();

        $creator->addCourse($data);

        return redirect()->route('courses')->with('status', 'Course created successfully!');
    }

    public function showCourse($id) {
        $course = Course::findOrFail($id);

        return view('courses.course_details', ['course' => $course]);
    }
}
