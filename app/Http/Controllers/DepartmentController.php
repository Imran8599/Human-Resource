<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Designation;

class DepartmentController extends Controller
{
    public function index()
    {
        $rows = Department::orderBy('department')->get();
        return view('department',compact('rows'));
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'department'=>'required'
        ]);

        $row = new Department;
        $row->department = $request->department;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Department added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function departmentEdit($id)
    {
        $rows = Department::orderBy('department')->get();
        $department = Department::find($id);
        return view('department',compact('department','rows'));
    }

    public function departmentUpdate(Request $request)
    {
        $request->validate([
            'department'=>'required'
        ]);

        $row = Department::find($request->id);
        $row->department = $request->department;

        $result = $row->save();
        if($result)
            return redirect('department')->with('message-success','Department update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function departmentDelete($id)
    {
        Designation::where(['department_id'=>$id])->delete();
        $result = Department::destroy($id);
        if($result)
            return redirect('department')->with('message-success','Department deleted successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function storeDesignation(Request $request)
    {
        $request->validate([
            'department_id'=>'required',
            'designation'=>'required'
        ]);

        $row = new Designation;
        $row->department_id = $request->department_id;
        $row->designation = $request->designation;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Designation added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function designationEdit($id)
    {
        $rows = Department::all();
        $designation = Designation::find($id);
        return view('department',compact('designation','rows'));
    }

    public function designationUpdate(Request $request)
    {
        $request->validate([
            'department_id'=>'required',
            'designation'=>'required'
        ]);

        $row = Designation::find($request->id);
        $row->department_id = $request->department_id;
        $row->designation = $request->designation;

        $result = $row->save();
        if($result)
            return redirect('department')->with('message-success','Designation update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function designationDelete($id)
    {
        $result = Designation::destroy($id);
        if($result)
            return redirect('department')->with('message-success','Designation deleted successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function selectDepartment()
    {
        return Designation::all();
    }
}
