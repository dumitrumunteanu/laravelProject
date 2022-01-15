<?php

namespace App\Services;

use App\Models\Task;
use Auth;
use Psr\Log\LoggerInterface;

class TaskCreator {
    private Task $task;
    private LoggerInterface $logger;

    public function __construct(Task $task, LoggerInterface $logger) {
        $this->task = $task;
        $this->logger = $logger;
    }

    public function addTask(array $data, int $courseId) {
        $this->task->create([
            'title' => $data['title'],
            'course_id' => $courseId,
            'description' => $data['description'],
            'date_due' => date('Y-m-d H:i', strtotime("{$data['date']} {$data['time']}")),
        ]);

        $this->logger->info('User ' . Auth::user()->email . ' added a new task to course with ID' . $courseId);
    }
}
