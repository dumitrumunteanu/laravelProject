<?php

namespace App\Http\Controllers;

use App\Http\Request\ContactRequest;
use App\Services\ContactMailer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function send(ContactRequest $request, ContactMailer $mailer) {
        $data = $request->validated();

        $mailer->send($data);

        return redirect()->route('contact')->withInput($data)->with('status', 'Message sent successfully!');
    }
}
