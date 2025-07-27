<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Contact, Product};
use Validator;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function send(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'mobile' => 'required|digits:10',
        'email' => 'nullable|email',
        'message' => 'nullable|string|max:1000',
    ]);

    // Send mail or save to database
    // Mail::to(...)->send(new ContactMail(...));
    Contact::create([
        'name'    => $request->name,
        'mobile'  => $request->mobile,
        'email'   => $request->email,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Your message has been sent successfully!');
    }


}
