<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplyLeave;

class LeaveController extends Controller
{
    public function index()
    {
        $rows = ApplyLeave::orderBy('id','desc')->get();
        return view('leave_application',compact('rows'));
    }

    public function approve($id)
    {
        $row = ApplyLeave::find($id);
        $row->status = 'Approve';
        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Leave Approved.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function delete($id)
    {
        $result = ApplyLeave::destroy($id);
        if($result)
            return redirect()->back()->with('message-success','Leave Deleted.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
