<?php


namespace App\Services;


use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ResizeImageService
{
    public function resize(Request $request)
    {
        $readyImages = [];
        foreach ($request->file('files') as $file) {
            $key = explode('.', $file->getClientOriginalName())[0];
            $img = Image::make($file);
            if ($file->getClientMimeType() == "image/gif") {
                $width = $request->widthPx ?? $img->getWidth() * (1 - $request->reduce);
                $height = $request->heightPx ?? $img->getHeight() * (1 - $request->reduce);
                $degree = $request['rotates'][$key] ?? 0;
                $this->rotateGIF($file, $degree, $width, $height);
                $readyImages[$file->getClientOriginalName()] = base64_encode(file_get_contents($file->getPathname()));
            } else {
                if (isset($request->widthPx)) {
                    $img->resize($request->widthPx, $request->heightPx);
                } else {
                    $reduce = 1 - $request->reduce;
                    $img->resize($img->getWidth() * $reduce, $img->getHeight() * $reduce);
                }

                if (isset($request['rotates'][$key])) {
                    $img->rotate($request['rotates'][$key]);
                }
                $img->encode();
                $readyImages[$file->getClientOriginalName()] = base64_encode($img);
            }
        }
        return $readyImages;
    }

    public function rotate($request)
    {
        $readyImages = [];

        foreach ($request['files'] as $file) {
            $key = explode('.', $file->getClientOriginalName())[0];

            if ($file->getClientMimeType() == "image/gif") {
                $this->rotateGIF($file, $request['rotates'][$key]);
                $readyImages[$file->getClientOriginalName()] = base64_encode(file_get_contents($file->getPathname()));
            } else {

                if (isset($request['rotates'][$key])) {
                    $img = Image::make($file)->rotate($request['rotates'][$key])->encode();
                } else {
                    $img = Image::make($file)->encode();
                }
                $readyImages[$file->getClientOriginalName()] = base64_encode($img);
            }
        }
        return $readyImages;
    }

    public function rotateGIF($file, $degree, $newHeight = null, $newWidth = null)
    {
        $imagick = new \Imagick($file->getPathname());
        $image = $imagick->coalesceImages();

        foreach ($image as $frame) {
            if ($newHeight && $newWidth)
                $frame->resizeImage($newHeight, $newWidth, \Imagick::FILTER_UNDEFINED, 1);
            $frame->rotateImage('#00000000', $degree);
        }

        $image = $image->deconstructImages();
        $image->writeImages($file->getPathname(), true);
    }
}
