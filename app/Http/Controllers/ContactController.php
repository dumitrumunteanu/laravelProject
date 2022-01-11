<?php

namespace App\Http\Controllers;

use App\Http\Request\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function send(ContactRequest $request) {
        $data = $request->validated();
        \Log::debug('test', $data);

        \Mail::send(
            'emails.contact',
            [
                'firstName' => $data['first-name'],
                'lastName' => $data['last-name'],
                'department' => $data['department'],
                'content' => $data['message'],
            ],
            function (Message $message) use ($data) {
                $message->subject('User requested attention');
                $message->to('contact@organizer.com');
                $message->from($data['email']);
            }
        );

        return redirect()->route('contact', ['data' => $data])->with('status', 'Message submitted successfully!');
    }
}
