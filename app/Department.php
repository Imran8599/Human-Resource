<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public static function totalDepartment()
    {
        return Department::all();
    }

    public static function countDepartment()
    {
        return Department::count();
    }

    public static function departmentName($id)
    {
        $row = Department::where(['id'=>$id])->first();
        return $row->department;
    }
}
