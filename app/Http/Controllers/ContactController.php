<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function contact(Request $request)
    {

        $request->validate([ 
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $result = Contact::create([ 
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);


        if ($result) {
            return redirect()->back()->with('msg','Message sent successfully!');
        } else {
            return redirect()->back()->with('msg', 'Something wrong happened! Try Again.');
        }

    }


}
