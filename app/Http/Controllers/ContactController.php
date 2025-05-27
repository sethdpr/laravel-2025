<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('emails.contact');
    }
    
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);
    
    $mailBody = "Van: " . $request->email . "\n\n" . $request->message;
    
    Mail::raw($mailBody, function ($message) use ($request) {
    $message->from(config('mail.from.address'), config('mail.from.name'))
            ->to(config('mail.to.address'), config('mail.to.name'))
            ->replyTo($request->email)
            ->subject($request->subject);
    });
        return redirect()->route('contact.show')->with('success', 'Message sent. We will get back to you soon.');
    }
}