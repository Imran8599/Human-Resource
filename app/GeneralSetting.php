<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    public static function website()
    {
        return GeneralSetting::all();
    }
    public static function websiteTitle()
    {
        $row = GeneralSetting::get()->first();
        return @$row->website_title;
    }
    public static function websiteFavIcon()
    {
        $row = GeneralSetting::get()->first();
        return @$row->website_logo;
    }
    public static function photo()
    {
        $row = GeneralSetting::get()->first();
        return @$row->website_logo;
    }
}
