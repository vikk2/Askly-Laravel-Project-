<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Example: send mail (set up mail config in .env)
        Mail::raw($data['message'], function ($message) use ($data) {
            $message->to('support@example.com')
                    ->subject('Contact Form Message from ' . $data['name'])
                    ->replyTo($data['email']);
        });

        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}
