<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public static function events()
    {
        // ["{title: ""+row.title+""", "start: ""+row.start+""", "end: ""+row.end+""", "url: ""+row.url+""},"]
        // $rows = Events::all();
        // foreach ($rows as $row) {
        //     return "[{ title: '".$row->title."', start: '".$row->start."', end: '".$row->end."'}]";
        // }
        
    }
}
