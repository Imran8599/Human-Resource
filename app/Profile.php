<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;

class Profile extends Model
{

    public static function employeeName($id)
    {
        $row = Profile::find($id);
        return $row->name;
    }

    public static function employeeDepartment($id)
    {
        $row = Profile::find($id);
        return Department::departmentName($row->department);
    }

    public static function employeeDesignation($id)
    {
        $row = Profile::find($id);
        return $row->designation;
    }
    public static function employeeID($id)
    {
        $row = Profile::find($id);
        return $row->employee_id;
    }
    public static function photo($id)
    {
        $row = Profile::find($id);
        return $row->photo;
    }
    public static function totalEmployee()
    {
        return Profile::count();
    }
}
