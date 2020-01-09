<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ViewAttendanceController extends Controller
{
    public function index()
    {
        $rows = Profile::orderBy('employee_id')->get();
        return view('view_attendance',compact('rows'));
    }
}
