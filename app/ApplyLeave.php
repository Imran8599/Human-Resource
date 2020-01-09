<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyLeave extends Model
{

    public static function lastAbsent($id)
    {
        $row = ApplyLeave::orderBy('id','desc')->where(['employee_id'=>$id,'status'=>'Approve'])->first();
        return @$row->date;
    }

    public static function todayAbsent($id)
    {
        $row = ApplyLeave::where(['employee_id'=>$id,'status'=>'Approve'])->where('date','>=',date('d-m-Y'))->first();
        if($row == '')
            return '1';
        $leave_day = $row->day;
        $date1=date_create($row->date);
        $date2=date_create(date('d-m-Y'));
        $diff=date_diff($date1,$date2);
        $day = $diff->format("%R%a");

        if($day >= 0 && $day < $leave_day)
            return '0';
        else
            return '1';
        
    }

    public static function applyLeave()
    {
        return ApplyLeave::where(['status'=>'Pending'])->count();
    }
}
