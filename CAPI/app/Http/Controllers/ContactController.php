<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Prepare email data
        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ];

        // Send to company email
        Mail::send('emails.contact', $data, function ($mail) use ($data) {
            $mail->to('info@capi-ksa.com')   // Company email
                 ->from($data['email'], $data['name'])
                 ->subject('New Contact Query from Website');
        });

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
