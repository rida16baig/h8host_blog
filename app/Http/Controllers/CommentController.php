<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function comment(Request $request)
    {

        $request->validate([ 
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $result = Comment::create([ 
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'comment' => $request->input('comment'),
        ]);


        if ($result) {
            return redirect()->back()->with('msg','Comment sent successfully!');
        } else {
            return redirect()->back()->with('msg', 'Something wrong happened! Try Again.');
        }

    }



}
