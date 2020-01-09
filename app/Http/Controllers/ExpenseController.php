<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $rows = Expense::orderBy('id','desc')->get();
        return view('expense',compact('rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'purchase_from' => 'required',
            'purchase_date' => 'required',
            'amount_price' => 'required'
        ]);

        $row = new Expense;
        $row->item_name = $request->item_name;
        $row->purchase_from = $request->purchase_from;
        $row->purchase_date = $request->purchase_date;
        $row->amount_price = $request->amount_price;

        $result = $row->save();
        if($result)
            return redirect()->back()->with('message-success','Expense added successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function edit($id)
    {
        $rows = Expense::orderBy('id','desc')->get();
        $expense = Expense::find($id);
        return view('expense',compact('expense','rows'));
    }

    public function delete($id)
    {
        $result = Expense::destroy($id);
        if($result)
            return redirect('expense')->with('message-success','Expense delete successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'purchase_from' => 'required',
            'purchase_date' => 'required',
            'amount_price' => 'required'
        ]);

        $row = Expense::find($request->id);
        $row->item_name = $request->item_name;
        $row->purchase_from = $request->purchase_from;
        $row->purchase_date = $request->purchase_date;
        $row->amount_price = $request->amount_price;

        $result = $row->save();
        if($result)
            return redirect('expense')->with('message-success','Expense update successfully.');
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
