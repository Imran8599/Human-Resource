<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralSetting;

class SettingController extends Controller
{
    public function generalSetting()
    {
        $rows = GeneralSetting::all();
        return view('general_setting',compact('rows'));
    }

    public function generalSettingStore(Request $request)
    {
        $request->validate([
            'website_name'=>'required',
            'website_title'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $row = new GeneralSetting;
        
        if($request->website_logo != '')
        {
            $request->validate([
                'website_logo'=>'required|image|mimes:jpeg,png,jpg'
            ]);
            
            $image = $request->file('website_logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/logo');
            $image->move($destinationPath, $name);
            $photo_name = 'public/logo/'.$name;
            $row->website_logo = $photo_name;
        }

        $row->website_name = $request->website_name;
        $row->website_title = $request->website_title;
        $row->email = $request->email;
        $row->password = $request->password;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Data added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function generalSettingEdit($id)
    {
        $rows = GeneralSetting::all();
        $web = GeneralSetting::find($id);
        return view('general_setting',compact('web','rows'));
    }

    public function generalSettingUpdate(Request $request)
    {
        $request->validate([
            'website_name'=>'required',
            'website_title'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $row = GeneralSetting::find($request->id);
        
        if($request->website_logo != '')
        {
            $request->validate([
                'website_logo'=>'required|image|mimes:jpeg,png,jpg'
            ]);
            
            $image = $request->file('website_logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/logo');
            $image->move($destinationPath, $name);

            if($row->website_logo != '')
                unlink($row->website_logo);

            $photo_name = 'public/logo/'.$name;
            $row->website_logo = $photo_name;
        }
        $row->website_name = $request->website_name;
        $row->website_title = $request->website_title;
        $row->email = $request->email;
        $row->password = $request->password;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Data update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');

    }

    public function emailSetting()
    {
        return view('email_setting');
    }
}
