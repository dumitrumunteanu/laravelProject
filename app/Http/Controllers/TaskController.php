<?php

namespace App\Http\Controllers;

use App\Http\Request\TaskRequest;
use App\Services\TaskCreator;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function store($courseId, TaskRequest $request, TaskCreator $creator) {
        $data = $request->validated();

        $creator->create($data, $courseId);

        return redirect()->route('course.show', $courseId)->with('status', 'Task created successfully!');
    }
}
