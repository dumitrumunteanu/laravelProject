<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Event;
use Auth;
use Psr\Log\LoggerInterface;

class EventCreator {
    private Event $event;
    private LoggerInterface $logger;

    public function __construct(Event $event, LoggerInterface $logger) {
        $this->event = $event;
        $this->logger = $logger;
    }

    public function addEvent(array $data) {
        $start = $data['start-date'] . ' ' . $data['start-time'];
        $end = $data['end-date'] . ' ' . $data['end-time'];

        $this->event->create([
            'course_id' => $data['title'],
            'start' => $start,
            'end' => $end,
            'title' => Course::findOrFail((int)$data['title'])->title,
            'recurrence_type' => $data['recurrence-type'],
        ]);

        $this->logger->info('User ' . Auth::user()->email . ' created a new event.');
    }
}
