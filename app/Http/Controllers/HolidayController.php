<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;

class HolidayController extends Controller
{
    public function index()
    {
        $rows = Holiday::orderBy('id','desc')->get();
        return view('holiday',compact('rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'occasion'=>'required',
            'day'=>'required'
        ]);

        $row = new Holiday;
        $row->date = $request->date;
        $row->occasion = $request->occasion;
        $row->day = $request->day;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Holiday added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function edit($id)
    {
        $holi = Holiday::find($id);
        $rows = Holiday::orderBy('id','desc')->get();
        return view('holiday',compact('rows','holi'));
    }

    public function delete($id)
    {
        $result = Holiday::destroy($id);
        if($result)
            return redirect('holiday')->with('message-success','Holiday delete successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function update(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'occasion'=>'required',
            'day'=>'required'
        ]);

        $row = Holiday::find($request->id);
        $row->date = $request->date;
        $row->occasion = $request->occasion;
        $row->day = $request->day;

        $result = $row->save();
        if($result)
            return redirect('holiday')->with('message-success','Holiday update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
