<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Profile;
use Session;

class EmployeeAuthController extends Controller
{
    public function employeeLogin()
    {
        return view('employee_login');
    }

    public function employeeLoginAuth(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]); 
        
        $row = Profile::where(['email'=>$request->email])->first();
        if($row != '')
        {
            $pass = Crypt::decryptString($row->password);
            if($request->password == $pass)
            {
                Session(['employee_email'=>$request->email, 'ID'=>$row->id]);
                return redirect('profile');
            }
            else
                return redirect()->back()->with('message-danger','Invalid Password!');
        }
        else
            return redirect()->back()->with('message-danger','Invalid Email!');

    }

    public function employeeLogout()
    {
        Session(['employee_email'=>'','ID'=>'']);
        return redirect('employee-login');
    }

}
