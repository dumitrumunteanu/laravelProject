<?php

namespace App\Services;

use App\Models\Course;
use Auth;
use Psr\Log\LoggerInterface;

class CourseCreator {
    private Course $course;
    private LoggerInterface $logger;

    public function __construct(Course $course, LoggerInterface $logger) {
        $this->course = $course;
        $this->logger = $logger;
    }

    public function addCourse(array $data) {
        $storeFileName = '';
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileExt = $file->getClientOriginalExtension();
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $storeFileName = str_replace(' ', '_', $fileName . '_' . now() . '.' . $fileExt);
            $file->move('storage/course_img', $storeFileName);
        }
        else {
            $storeFileName= 'defaultbg.png';
        }

        $courseId = $this->course->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $storeFileName,
            'created_at' => now(),
        ])->id;
        Auth::user()->courses()->attach($courseId);

        $this->logger->info('User ' . Auth::user()->email . ' created a new course.');
    }
}
