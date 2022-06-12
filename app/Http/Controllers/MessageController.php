<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{





/*
|----------------------------------------------------------------------------------------
|                                 VIEWERS MESSAGE METHOD
|----------------------------------------------------------------------------------------
*/
    public function viewersMessage(Request $request){

        // Validation portion
        $request->validate([
            '*'             => 'required',
            'email'         => 'required|email',
        ], [
            '*.required'    => 'This field is required',
            'email.email'   => 'Please enter a valid email',
        ]);

        // Insert portion
        Message::insert([
            'name'          => $request->name,
            'email'         => $request->email,
            'message'       => $request->message,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully send your messages');
    }





/*
|----------------------------------------------------------------------------------------
|                                 VIEW MESSAGES METHOD
|----------------------------------------------------------------------------------------
*/
    public function viewMessages(){
        $messages = Message::all();
        return view('backend.message.view', compact('messages'));
    }

}
