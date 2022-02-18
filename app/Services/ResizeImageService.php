<?php


namespace App\Services;


use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ResizeImageService
{
    public static function resize(Request $request)
    {
        $readyImages = [];

        foreach ($request->file('files') as $file) {
            $img = Image::make($file);

            if (isset($request->widthPx)) {
                $img->resize($request->widthPx, $request->heightPx)->encode();

            } else {
                $reduce = 1 - $request->reduce;
                $img->resize($img->getWidth() * $reduce, $img->getHeight() * $reduce)->encode();
            }
            $readyImages[$file->getClientOriginalName()] = base64_encode($img);
        }
        return $readyImages;
    }

    public static function rotate($request)
    {
        $readyImages = [];

        foreach ($request['files'] as $file) {
            $key = explode('.', $file->getClientOriginalName())[0];
            if (isset($request['rotates'][$key])) {
                $img = Image::make($file)->rotate($request['rotates'][$key])->encode();
            } else {
                $img = Image::make($file)->encode();
            }
            $readyImages[$file->getClientOriginalName()] = base64_encode($img);
        }
        return $readyImages;
    }
}
