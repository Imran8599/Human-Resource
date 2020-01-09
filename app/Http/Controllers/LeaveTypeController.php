<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveType;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $rows = LeaveType::orderBy('leave')->get();
        return view('leave_type',compact('rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave'=>'required',
            'day'=>'required'
        ]);

        $row = new LeaveType;
        $row->leave = $request->leave;
        $row->day = $request->day;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Data added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function edit($id)
    {
        $rows = LeaveType::orderBy('leave')->get();
        $leave = LeaveType::find($id);
        return view('leave_type',compact('rows','leave'));
    }

    public function delete($id)
    {
        $result = LeaveType::destroy($id);
        if($result)
            return redirect('leavetype')->with('message-success','Data delete successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function update(Request $request)
    {
        $request->validate([
            'leave'=>'required',
            'day'=>'required'
        ]);

        $row = LeaveType::find($request->id);
        $row->leave = $request->leave;
        $row->day = $request->day;

        $result = $row->save();
        if($result)
            return redirect('leavetype')->with('message-success','Data update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
