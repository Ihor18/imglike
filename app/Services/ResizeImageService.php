<?php


namespace App\Services;


use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ResizeImageService
{
    public function resize(Request $request)
    {
        $readyImages = [];
        foreach ($request->file('files') as $file) {
            $key =  $file->getClientOriginalName();
            $img = Image::make($file);
            $path = $file->getClientOriginalName();
            if ($file->getClientMimeType() == "image/gif") {
                $width = $request->widthPx ?? $img->getWidth() * (1 - $request->reduce);
                $height = $request->heightPx ?? $img->getHeight() * (1 - $request->reduce);
                $degree = $request['rotates'][$key] ?? 0;

                $this->rotateGIF($file, $degree, $width, $height, storage_path('app/public/' . $path));
                $files[] = $path;
            } else {

                if (isset($request->widthPx)) {
                    $img->resize($request->widthPx, $request->heightPx)->save(storage_path('app/public/' . $path));
                } else {
                    $reduce = 1 - $request->reduce;
                    $img->resize($img->getWidth() * $reduce, $img->getHeight() * $reduce)->save(storage_path('app/public/' . $path));
                }

                if (isset($request['rotates'][$key])) {
                    $img->rotate($request['rotates'][$key])->save(storage_path('app/public/' . $path));
                }
                $files[] = $path;
            }
        }
        ZipArchiveService::makeZipFromPath($files, $request['time']);
        $readyImages['resized.zip'] = base64_encode(file_get_contents(storage_path('app/public/' . $request['time'] . '.zip')));
        unlink(storage_path('app/public/' . $request['time'] . '.zip'));
        return $readyImages;
    }

    public function rotate($request)
    {
        $readyImages = [];

        foreach ($request['files'] as $file) {
            $key =  $file->getClientOriginalName();
            $path = $file->getClientOriginalName();
            if ($file->getClientMimeType() == "image/gif") {
                $this->rotateGIF($file, $request['rotates'][$key],null,null,storage_path('app/public/' . $path));
                $files[] = $path;
            } else {

                if (isset($request['rotates'][$key])) {
                    $img = Image::make($file)->rotate($request['rotates'][$key])->save(storage_path('app/public/' . $path));
                } else {
                    $img = Image::make($file)->save(storage_path('app/public/' . $path));
                }
                $files[] = $path;;
            }
        }
        ZipArchiveService::makeZipFromPath($files, $request['time']);
        $readyImages['rotated.zip'] = base64_encode(file_get_contents(storage_path('app/public/' . $request['time'] . '.zip')));
        unlink(storage_path('app/public/' . $request['time'] . '.zip'));
        return $readyImages;
    }

    public function rotateGIF($file, $degree, $newHeight = null, $newWidth = null, $path = null)
    {
        $imagick = new \Imagick($file->getPathname());
        $image = $imagick->coalesceImages();
        $path ?? $file->getPathname();
        foreach ($image as $frame) {
            if ($newHeight && $newWidth)
                $frame->resizeImage($newHeight, $newWidth, \Imagick::FILTER_UNDEFINED, 1);
            $frame->rotateImage('#00000000', $degree);
        }

        $image = $image->deconstructImages();
        $image->writeImages($path, true);
    }
}
