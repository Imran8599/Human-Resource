<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Profile;
use App\Notice;
use App\Holiday;
use App\Award;
use App\LeaveType;
use App\ApplyLeave;
use App\Chat;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Session::get('ID');
        $row = Profile::find($id);
        $notices = Notice::orderBy('id','desc')->where(['status'=>'Active'])->get();
        $holidays = Holiday::where('date','>=',date('d-m-Y'))->take(2)->get();
        $awards = Award::where(['employee_id'=>$id])->get();
        $leave_types = LeaveType::all();
        $chats = Chat::orderBy('id','desc')->get();
        $leaves = ApplyLeave::where(['employee_id'=>$id])->orderBy('id','desc')->take(3)->get();
        return view('profile',compact('row','chats','notices','holidays','awards','leave_types','leaves'));
    }
}
