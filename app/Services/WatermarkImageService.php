<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class WatermarkImageService
{
    public static function watermark($request)
    {
        $readyImages = [];

        foreach ($request['files'] as $file) {
            $path = $file->getClientOriginalName();
            $img = Image::make($file);

            $width = $img->width();
            $height = $img->height();
            $x = 0;
            $y = 0;
            if (isset($request['position_x'])) {
                $x = $request['position_x'];
                $y = $request['position_y'];
            } else {
                switch ($request['position_align']) {
                    case 'center':
                        $x = $width / 2;
                        break;
                    case 'right':
                        $x = $width;
                        break;
                }
                switch ($request['position_valign']) {
                    case 'middle':
                        $y = $height / 2;
                        break;
                    case 'bottom':
                        $y = $height;
                        break;
                }
            }

            if (isset($request['text'])) {
                $img->text($request['text'], $x, $y, function ($font) use ($request) {
                    $font->file(public_path('fonts/Roboto-Regular.ttf'));
                    $font->size($request['font-size']);
                    $font->color(json_decode($request['color']));
                    $font->align($request['position_align']);
                    $font->valign($request['position_valign']);
                    $font->angle($request['angle']);
                });
            } else {
                $img->insert($request['watermark_file'], $request['position_mark'],$x, $y);
            }
            $img->save(storage_path('app/public/'.$path));
            $files[] = $path;
        }
        ZipArchiveService::makeZipFromPath($files, $request['time']);
        $readyImages['watermark.zip'] = base64_encode(file_get_contents(storage_path('app/public/' . $request['time'] . '.zip')));
        unlink(storage_path('app/public/' . $request['time'] . '.zip'));
        return $readyImages;
    }

}
