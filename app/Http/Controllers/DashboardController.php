<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Chat;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Events::where('start','>=',date('d F 00:00 ').'am')->orwhere('start','>=',date('d F 00:00 ').'pm')->orderBy('start')->get();
        $chats = Chat::orderBy('id','desc')->get();
        return view('dashboard',compact('chats','events'));
    }

    public function allEvents()
    {
        return Events::all();
    }
}
