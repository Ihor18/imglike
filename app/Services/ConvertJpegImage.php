<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ConvertJpegImage
{
    public static function toJpeg($request)
    {
        $readyImages = [];
        foreach ($request['files'] as $file) {
            $path = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.jpg';
            Image::make($file)->encode('jpg')->save(storage_path('app/public/'.$path));
            $files[] = $path;
        }
        ZipArchiveService::makeZipFromPath($files,$request['time']);
        $readyImages['converted.zip'] = base64_encode(file_get_contents(storage_path('app/public/'.$request['time'].'.zip')));
        unlink(storage_path('app/public/'.$request['time'].'.zip'));
        return $readyImages;
    }

    public static function fromJpeg($request)
    {
        $readyImages = [];
        if ($request['format'] == 'png') {
            foreach ($request['files'] as $file) {
                $path = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.png';
                $img = Image::make($file)->encode('png')->save(storage_path('app/public/'.$path));
                $files[] = $path;
            }
        } else {
            if ($request['type'] == 'static') {
                foreach ($request['files'] as $file) {
                    $path = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.gif';
                    $img = Image::make($file)->encode('gif')->save(storage_path('app/public/'.$path));
                    $files[] = $path;
                }
            } else {
                if ($request['save_prop']) {
                    $data = getimagesize($request['files'][0]);
                    $width = $data[0];
                    $height = $data[1];
                    foreach ($request['files'] as $file) {
                        $newSize = getimagesize($request['files'][0]);
                        if ($newSize[0] < $width) {
                            $width = $newSize[0];
                            $height = $newSize[1];
                        }
                    }
                    foreach ($request['files'] as $file) {
                        $path = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.png';
                        Image::make($file)->resize($width, $height)->save(storage_path('app/public/'.$path));
                        $files[] = $path;
                    }
                }
                foreach ($request['files'] as $file) {
                    $frames[] = $file->getPathname();
                }
                    $path = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.gif';
                    $anim = new AnimatedGIF();
                    $anim->create($frames, array($request['duration'] * 100));
                    $anim->save(storage_path('app/public/'.$path));
                    $files[] = $path;
            }
        }
        ZipArchiveService::makeZipFromPath($files,$request['time']);
        $readyImages['converted.zip'] = base64_encode(file_get_contents(storage_path('app/public/'.$request['time'].'.zip')));
        unlink(storage_path('app/public/'.$request['time'].'.zip'));
        return $readyImages;
    }
}
