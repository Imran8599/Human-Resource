<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        $rows = Notice::orderBy('id','desc')->get();
        return view('notice',compact('rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $row = new Notice;
        $row->title = $request->title;
        $row->description = $request->description;
        $row->status = $request->status;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Notice added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');

    }

    public function edit($id)
    {
        $notice = Notice::find($id);
        $rows = Notice::orderBy('id','desc')->get();
        return view('notice',compact('rows','notice'));
    }

    public function delete($id)
    {
        $result = Notice::destroy($id);
        if($result)
            return redirect('notice')->with('message-success','Notice delete successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $row = Notice::find($request->id);
        $row->title = $request->title;
        $row->description = $request->description;
        $row->status = $request->status;

        $result = $row->save();
        if($result)
            return redirect('notice')->with('message-success','Notice update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
