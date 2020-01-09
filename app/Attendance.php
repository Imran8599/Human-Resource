<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public static function totalAttendance($id)
    {
        return Attendance::where(['employee_id'=>$id,'status'=>'P'])->count();
    }
    public static function totalLate($id)
    {
        return Attendance::where(['employee_id'=>$id,'status'=>'La'])->count();
    }
    public static function totalLeave($id)
    {
        return Attendance::where(['employee_id'=>$id,'status'=>'Le'])->count();
    }
    public static function totalAbsent($id)
    {
        return Attendance::where(['employee_id'=>$id,'status'=>'A'])->count();
    }
    public static function totalDay($id)
    {
        return Attendance::where(['employee_id'=>$id])->count();
    }

    public static function present()
    {
        return Attendance::where(['date'=>date('d-m-Y')])->whereIn('status',['P','La'])->count();
    }

    public static function active($id)
    {
        return Attendance::where(['date'=>date('d-m-Y'),'employee_id'=>$id])->first();
    }

}
