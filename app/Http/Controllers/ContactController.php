<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMessage;

class ContactController extends Controller
{
    public function showContact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        UserMessage::create([
            'customer_name' => $request->input('customer_name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'submit_date' => now(),
            'read_status' => 0, // default unread
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
