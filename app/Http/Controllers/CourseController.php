<?php

namespace App\Http\Controllers;

use App\Http\Request\CourseRequest;
use App\Models\Course;
use App\Services\CourseCreator;
use App\Services\ModelLogger;
use http\Client\Curl\User;
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

        $searchText = $request['text'] ?? '';
        if (Auth::check()) {
            $courses = Auth::user()->courses()->where('title', 'like', "%{$searchText}%")->orderBy($sortBy, $sortOrder)->paginate(12);
        }
        else {
            $courses = Course::where('title', 'like', "%{$searchText}%")->orderBy($sortBy, $sortOrder)->paginate(12);
        }

        $courses->appends([
            'sort' => ($sortBy === 'created_at' ? 'date' : 'title') . '_' . $sortOrder,
            'page' => ($request['page'] ?? '1'),
            'text' => $searchText,
        ]);

        return view('courses.courses', ['courses' => $courses]);
    }

    public function store(CourseRequest $request, CourseCreator $creator) {
        $data = $request->validated();

        $creator->addCourse($data);

        $data = [];

        return redirect()->route('courses')->withInput($data)->with('status', 'Course created successfully!');
    }

    public function showCourse($id, Request $request, ModelLogger $logger) {
        $course = Course::findOrFail($id);

        $logger->logModel($request->user(), $course);

        if (!$course->users->contains(Auth::user())) {
            return redirect(route('courses'));
        }

        $enrolledUsers = $course->users;

        $tasks = $course->tasks()->orderBy('date_due', 'DESC')->get();

        return view('courses.course_details', [
            'course' => $course,
            'enrolledUsers' => $enrolledUsers,
            'tasks' => $tasks,
        ]);
    }

    public function removeUser($courseId, $userId) {
        Course::findOrFail($courseId)->users()->detach($userId);
        return redirect()->route('course.show', $courseId)->with('status', 'User removed successfully!');
    }
}
