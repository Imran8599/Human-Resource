<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralSetting;

class AdminAuthController extends Controller
{
    public function adminLogin()
    {
        return view('admin_login');
    }

    public function adminLoginAuth(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]); 
        
        $row = GeneralSetting::where(['email'=>$request->email])->first();
        if($row != '')
        {
            if($request->password == $row->password)
            {
                Session(['admin_email'=>$request->email, 'ID'=>'Admin']);
                return redirect('/');
            }
            else
                return redirect()->back()->with('message-danger','Invalid Password!');
        }
        else
            return redirect()->back()->with('message-danger','Invalid Email!');
    }

    public function adminLogout()
    {
        Session(['admin_email'=>'', 'ID'=>'']);
        return redirect('admin-login');
    }
}
