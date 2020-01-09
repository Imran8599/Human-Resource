<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Award;
use App\Profile;

class AwardController extends Controller
{
    public function index()
    {
        $employees = Profile::all();
        $rows = Award::orderBy('id','desc')->get();
        return view('award',compact('rows','employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'award_name'=>'required',
            'gift_item'=>'required',
            'employee_id'=>'required',
            'date'=>'required'
        ]);

        $row = new Award;
        $row->award_name = $request->award_name ;
        $row->gift_item = $request->gift_item ;
        $row->employee_id = $request->employee_id ;
        $row->date = $request->date ;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Award added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
        
    }
    
    public function edit($id)
    {
        $employees = Profile::all();
        $rows = Award::orderBy('id','desc')->get();
        $award_row = Award::find($id);
        return view('award',compact('award_row','rows','employees'));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'award_name'=>'required',
            'gift_item'=>'required',
            'employee_id'=>'required',
            'date'=>'required'
        ]);

        $row = Award::find($request->id);
        $row->award_name = $request->award_name ;
        $row->gift_item = $request->gift_item ;
        $row->employee_id = $request->employee_id ;
        $row->date = $request->date ;

        $result = $row->save();
        if($result)
            return redirect('award')->with('message-success','Award update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
    
    public function delete($id)
    {
        $result = Award::destroy($id);
        if($result)
            return redirect()->back()->with('message-success','Award delete successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
