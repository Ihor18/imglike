<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class ProccessbarService
{

    public static function writeToFile($path, $value)
    {
        Storage::disk('local')->put('/public/' . $path, $value);
    }

    public static function getFromFile($path)
    {
        return Storage::disk('local')->get('public/'.$path);
    }

    public static function removeFile($path)
    {
        Storage::disk('local')->delete('public/'.$path);
    }

}
