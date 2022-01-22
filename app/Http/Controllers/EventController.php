<?php

namespace App\Http\Controllers;

use App\Http\Request\EventRequest;
use App\Services\EventCreator;
use Illuminate\Http\Request;

class EventController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(EventRequest $request, EventCreator $creator) {
        $data = $request->validated();

        $creator->addEvent($data);

        return redirect()->route('calendar')->withInput($data)->with('status', 'Event created successfully!');
    }
}
