<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Payroll;
use App\LeaveType;
use Session;

class PayrollController extends Controller
{
    public function index()
    {
        return view('payroll/payroll_search');
    }

    public function search(Request $request)
    {
        Session(['month'=>$request->month,'year'=>$request->year,'department'=>$request->department]);
        $rows = Profile::where(['department'=>$request->department])->get();
        return view('payroll/payroll_search',compact('rows'));
    }

    public function payrollGenerate($id)
    {
        $row = Profile::find($id);
        $leave_types = LeaveType::all();
        return view('payroll/payroll_generate',compact('row','leave_types'));
    }

    public function payrollGenerator(Request $request)
    {
        $request->validate([
            'employee_no' => 'required',
            'basic_salary' => 'required',
            'net_salary' => 'required'
        ]);

        $row = new Payroll;
        $row->employee_no = $request->employee_no;
        $row->month_year = Session::get('month').'|'.Session::get('year');
        $row->earning_note = $request->earning_note;
        $row->earning_value = $request->earning_value;
        $row->deduction_note = $request->deduction_note;
        $row->deduction_value = $request->deduction_value;
        $row->basic_salary = $request->basic_salary;
        $row->net_salary = $request->net_salary;

        $result = $row->save();
        if($result)
            return redirect('payroll')->with('message-success','Payroll Generate successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');

    }

    public function payrollPayView($id)
    {
        $pay = Payroll::where(['employee_no'=>$id,'month_year'=>Session::get('month').'|'.Session::get('year')])->first();
        return view('payroll/payroll_pay',compact('pay'));
    }

    public function payrollPay(Request $request)
    {
        
        $request->validate([
            'payment_method'=>'required'
        ]);

        $row = Payroll::find($request->payroll_id);
        $row->payment_method = $request->payment_method;
        $row->note = $request->note;

        $result = $row->save();
        if($result)
            return redirect('payroll')->with('message-success','Pay successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function payrollView($id)
    {
        $view = Payroll::where(['employee_no'=>$id,'month_year'=>Session::get('month').'|'.Session::get('year')])->first();
        return view('payroll/payroll_view',compact('view'));
    }

    public function payrollReport()
    {
        $rows = Payroll::where('payment_method','!=', null)->orderBy('id','desc')->get();
        return view('payroll/payroll_report',compact('rows'));
    }
}
