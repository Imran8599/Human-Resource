<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\LeaveType;
use App\ApplyLeave;
use App\Profile;
use Session;

class ApplyLeaveController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'day'=>'required',
            'leave_type'=>'required',
            'reason'=>'required'
        ]);

        $row = new ApplyLeave;
        $row->employee_id = Session::get('ID');
        $row->date = $request->date;
        $row->day = $request->day;
        $row->leave_type = $request->leave_type;
        $row->reason = $request->reason;
        $row->status = 'Pending';

        $result = $row->save();
        if($result)
            return redirect('profile')->with('message-success','Leave apply successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password'=>'required',
            'con_password'=>'required'
        ]);

        if($request->password == $request->con_password)
        {
            $row = Profile::find($request->id);
            $row->password = Crypt::encryptString($request->password);
    
            $result = $row->save();
            if($result)
                return redirect('profile')->with('message-success','Password Update successfully.');
            else
                return redirect()->back()->with('message-danger','Something is wrong !');
        }
        else
            return redirect()->back()->with('message-danger','Please enter correct password!');
    }
}
