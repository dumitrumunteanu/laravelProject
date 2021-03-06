<?php

namespace App\Http\Controllers;

use App\Http\Request\TaskRequest;
use App\Models\Task;
use App\Services\TaskCreator;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function store($courseId, TaskRequest $request, TaskCreator $creator) {
        $data = $request->validated();

        $creator->addTask($data, $courseId);

        return redirect()->route('course.show', $courseId)->with('status', 'Task created successfully!');
    }

    public function delete($courseId, $taskId) {
        Task::findOrFail($taskId)->delete();

        return redirect()->route('course.show', $courseId)->with('status', 'Task deleted successfully!');
    }
}
