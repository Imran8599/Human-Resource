<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public static function generate($id)
    {
        return Payroll::where(['employee_no'=>$id, 'month_year'=>Session::get('month').'|'.Session::get('year'), 'payment_method'=>null])->first();
    }

    public static function paid($id)
    {
        return Payroll::where(['employee_no'=>$id, 'month_year'=>Session::get('month').'|'.Session::get('year')])->where('payment_method','!=', null)->first();
    }
}
