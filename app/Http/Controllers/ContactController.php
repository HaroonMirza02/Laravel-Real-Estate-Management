<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
            'agent_id' => 'required|integer',
            'property_id' => 'required|integer',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'agent_id' => $request->agent_id,
            'property_id' => $request->property_id,
            
        ]);

        return redirect()->back()->with('success', 'Your message has been sent. We will get back to you soon.');
    }

    public function sendMail(Request $request){

        $mailData = [
            'title' => $request->title,
            'subject' => $request->subject,
            'body' => $request->message
        ];

        Mail::to($request->to)->send(new DemoMail($mailData));
        return redirect(route('agent.reply'));
    }

}
