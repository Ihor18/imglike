<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class WatermarkImageService
{
    public static function watermark($request)
    {
        info($request);
        $process = 1;
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);

        foreach ($request['files'] as $path) {

            $pathArr = explode('/', $path);
            $fileName = $pathArr[count($pathArr) - 1];
            $file = new UploadedFile($path, $fileName);

            $img = Image::make($file);

            $width = $img->width();
            $height = $img->height();
            $x = 0;
            $y = 0;
            if (isset($request['position_x'])) {
                $x = $request['position_x'];
                $y = $request['position_y'];
            } else if (isset($request['text'])) {
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
                $watermarkPath = $request['watermark_file'];
                $pathArray = explode('/', $watermarkPath);
                $watermarkName = $pathArray[count($pathArray) - 1];
                $wtFile = new UploadedFile($watermarkPath, $watermarkName);

                $watermarkImage = Image::make($wtFile)->opacity(100 - $request['opacity'])->resize($request['watermark_w'], $request['watermark_h']);
                $img->insert($watermarkImage, $request['position_mark'], $x, $y);
            }
            $img->save($path);
            $files[] = $file;

            ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
            $process++;
        }
        if(isset($wtFile)){
            unlink($wtFile->getPathname());
        }
        ZipArchiveService::makeZip($files, $request['id']);
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
    }

}
