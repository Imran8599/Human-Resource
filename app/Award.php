<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    public static function employeeCout($id)
    {
        return Award::where('employee_id','=',$id)->get()->count();
    }
}
