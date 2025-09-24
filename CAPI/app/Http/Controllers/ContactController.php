<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Send email
        Mail::send('emails.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->message
        ], function ($mail) use ($request) {
            $mail->to('info@capi-ksa.com') // Your company email
                 ->subject('New Contact Form Submission')
                 ->from($request->email, $request->name);
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}

