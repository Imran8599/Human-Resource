<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Attendance;

class MarkAttendanceController extends Controller
{
    public function index()
    {
        $rows = Profile::orderBy('employee_id')->get();
        return view('mark_attendance',compact('rows'));
    }

    public function store(Request $request)
    {
        $date = Attendance::orderBy('id','desc')->first();
        if($date == null)
        {
            $employees= $request->employee_id;
            $status = $request->status;
            $i = 0;
            foreach ($employees as $employee) {
                $row = new Attendance;
                $row->employee_id = $employee;
                $row->status = $status[$i];
                $row->date = $request->date;
                $row->save();
                ++$i;
            }
            return redirect()->back()->with('message-success','Data added');
        }
        elseif($date->date != $request->date)
        {
            $employees= $request->employee_id;
            $status = $request->status;
            $i = 0;
            foreach ($employees as $employee) {
                $row = new Attendance;
                $row->employee_id = $employee;
                $row->status = $status[$i];
                $row->date = $request->date;
                $row->save();
                ++$i;
            }
            return redirect()->back()->with('message-success','Data added');
        }
        else
        {
            return redirect()->back()->with('message-danger','Data already added');
        }
    }
}
