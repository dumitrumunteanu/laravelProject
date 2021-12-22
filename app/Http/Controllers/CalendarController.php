<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('calendar.calendar');
    }

    public function events() {
        $events  = [];

        foreach (Auth::user()->courses as $course) {
            foreach ($course->events as $event) {
                $events[] = [
                    'start' => $event['start'],
                    'end' => $event['end'],
                    'title' => $course->title,
                ];
            }
        }

        return json_encode($events);
    }
}
