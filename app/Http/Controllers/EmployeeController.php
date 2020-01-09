<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Department;
use App\Profile;

class EmployeeController extends Controller
{
    public function index()
    {
        $rows = Profile::orderBy('employee_id')->get();
        return view('employees',compact('rows'));
    }

    public function addEmployee()
    {
        $rows = Department::all();
        return view('add_employee',compact('rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);


        $row = new Profile;
        $row->employee_id = $request->employee_id;
        $row->name = $request->name;
        $row->email = $request->email;
        $row->password = Crypt::encryptString($request->password);
        
        $row->department = $request->department;
        $row->designation = $request->designation;
        $row->joining_date = $request->joining_date;
        $row->joining_salary = $request->joining_salary;
        $row->current_salary = $request->current_salary;
        
        if($request->photo != '')
        {
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg'
            ]);
            
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/profile_photos');
            $image->move($destinationPath, $name);
            $photo_name = 'public/profile_photos/'.$name;
            $row->photo = $photo_name;
        }

        $row->father_name = $request->father_name;
        $row->birth_day = $request->birth_day;
        $row->gender = $request->gender;
        $row->phone = $request->phone;
        $row->local_addrss = $request->local_addrss;
        $row->parmanent_addrss = $request->parmanent_addrss;
        $row->resume = $request->resume;
        $row->offer_letter = $request->offer_letter;
        $row->joining_letter = $request->joining_letter;
        $row->agreement = $request->agreement;
        $row->id_proof = $request->id_proof;
        $row->account_name = $request->account_name;
        $row->account_number = $request->account_number;
        $row->bank_name = $request->bank_name;
        $row->branch = $request->branch;

        $result = $row->save();
        if($result)
            return redirect('employee')->with('message-success','Employee added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');

    }

    public function employeeEdit($id)
    {
        $rows = Department::all();
        $row = Profile::find($id);
        return view('add_employee',compact('row','rows'));
    }

    public function employeeUpdate(Request $request)
    {
        $request->validate([
            'employee_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $row = Profile::find($request->id);
        $row->employee_id = $request->employee_id;
        $row->name = $request->name;
        $row->email = $request->email;
        $row->password = Crypt::encryptString($request->password);
        
        $row->department = $request->department;
        $row->designation = $request->designation;
        $row->joining_date = $request->joining_date;
        $row->joining_salary = $request->joining_salary;
        $row->current_salary = $request->current_salary;

        if($request->photo != '')
        { 
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg'
            ]);

            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/profile_photos');
            $image->move($destinationPath, $name);

            if($row->photo != '')
                unlink($row->photo);

            $photo_name = 'public/profile_photos/'.$name;
            $row->photo = $photo_name;
        }
        
        $row->father_name = $request->father_name;
        $row->birth_day = $request->birth_day;
        $row->gender = $request->gender;
        $row->phone = $request->phone;
        $row->local_addrss = $request->local_addrss;
        $row->parmanent_addrss = $request->parmanent_addrss;
        $row->resume = $request->resume;
        $row->offer_letter = $request->offer_letter;
        $row->joining_letter = $request->joining_letter;
        $row->agreement = $request->agreement;
        $row->id_proof = $request->id_proof;
        $row->account_name = $request->account_name;
        $row->account_number = $request->account_number;
        $row->bank_name = $request->bank_name;
        $row->branch = $request->branch;

        $result = $row->save();
        if($result)
            return redirect('employee')->with('message-success','Employee update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');

    }

    public function employeeDelete($id)
    {
        $result = Profile::destroy($id);
        if($result)
            return redirect()->back()->with('message-success','Employee delete successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
