<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class WatermarkImageService
{
    public static function watermark($request){
        $readyImages = [];

        foreach ($request['files'] as $file) {

            $img = Image::make($file);
            if (isset($request['text'])) {
                $img->text($request['text'], $request['position_x'], $request['position_y'], function ($font) use ($request) {
                    $font->file('fonts/arial.ttf');
                    $font->color([0, 0, 0]);
                    $font->align($request['position_align']);
                    $font->valign($request['position_valign']);
                    $font->size($request['font-size']);
                    $font->angle($request['angle']);
                });
            } else {
                $img->insert($request['watermark_file'], $request['position_mark'], $request['position_x'], $request['position_y']);
            }
            $img->encode();
            $readyImages[$file->getClientOriginalName()] = base64_encode($img);
        }
        return $readyImages;
    }

}
