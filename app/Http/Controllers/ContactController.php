<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
use Illumniate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index'); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
            
        ]);
    
        $adminEmails = User::where('is_admin', 1)->pluck('email');
        Contact::create($validated);

        foreach ($adminEmails as $email) {
            Mail::to($email)->send(new ContactFormSubmitted($validated));
        }
    
        return redirect()->route('contacts.index')->with('status', 'Your message has been sent!');
    }
}
