<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ConvertJpegImage
{
    public static function toJpeg($request)
    {
        $readyImages = [];
        foreach ($request['files'] as $file) {

            $img = Image::make($file)->encode('jpg');
            $readyImages[explode('.', $file->getClientOriginalName())[0] . '.' . 'jpeg'] = base64_encode($img);
        }
        return $readyImages;
    }

    public static function fromJpeg($request)
    {
        $readyImages = [];
        if ($request['format'] == 'png') {
            foreach ($request['files'] as $file) {
                $img = Image::make($file)->encode('png');
                $readyImages[explode('.', $file->getClientOriginalName())[0] . '.' . $request['format']] = base64_encode($img);
            }
        } else {
            if ($request['type'] == 'static') {
                foreach ($request['files'] as $file) {
                    $img = Image::make($file)->encode('gif');
                    $readyImages[explode('.', $file->getClientOriginalName())[0] . '.' . $request['format']] = base64_encode($img);
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
                        Image::make($file)->resize($width, $height)->save($file->getPathname());
                    }
                }
                foreach ($request['files'] as $file) {
                    $frames[] = $file->getPathname();
                }
                    $anim = new AnimatedGIF();
                    $anim->create($frames, array($request['duration'] * 100));
                    $readyImages['result.gif'] = base64_encode($anim->get());

            }
        }
        return $readyImages;
    }
}
