<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create()
    {
        return view('send-email');
    }



    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Create an array with email data
        $emailData = [
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Send the email using the Mailable class
        Mail::to($request->email)
            ->send(new SendEmail($emailData));

        return redirect()->route('email.success')->with('success', 'Email sent successfully.');
    }
}
