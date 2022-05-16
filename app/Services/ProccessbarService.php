<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class ProccessbarService
{

    public static function writeToFile($key, $value)
    {
        Storage::disk('local')->put($key.'.txt',$value);
    }

    public static function getFromFile($key)
    {
        return Storage::disk('local')->get($key.'.txt');
    }

    public static function removeFile($key)
    {
        return Storage::disk('local')->delete($key.'.txt');
    }

}
