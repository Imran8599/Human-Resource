<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class EventsController extends Controller
{
    public function index()
    {
        $rows = Events::orderBy('id','desc')->get();
        return view('events',compact('rows'));
    }

    public function allEvents()
    {
        return Events::orderBy('start')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $row = new Events;
        $row->title = $request->title;
        $row->start = $request->start;
        $row->end = $request->end;
        $row->created_at = date('d-m-Y');

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Event Added.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function edit($id)
    {
        $rows = Events::orderBy('id','desc')->get();
        $events = Events::find($id);
        return view('events',compact('events','rows'));
    }

    public function delete($id)
    {
        $result = Events::destroy($id);
        if($result)
            return redirect()->back()->with('message-success','Events Deleted.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $row = Events::find($request->id);
        $row->title = $request->title;
        $row->start = $request->start;
        $row->end = $request->end;

        $result = $row->save();
        if($result)
            return redirect('events')->with('message-success','Event Updated.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
