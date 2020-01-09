<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public static function allDesignations($id)
    {
        return Designation::where(['department_id'=>$id])->get();
    }
}
