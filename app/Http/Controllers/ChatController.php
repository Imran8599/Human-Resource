<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Session;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message'=>'required'
        ]);
        $row = new Chat;
        $row->sender_id = Session::get('ID');
        $row->message = $request->message;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Message send.');
        else
            return redirect()->back()->with('message-danger','Message not send!');
    }
}
