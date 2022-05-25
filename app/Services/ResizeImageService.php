<?php


namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class ResizeImageService
{
    public function resize($request)
    {
        $process = 1;
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
        foreach ($request['files'] as $path) {

            $pathArr = explode('/', $path);
            $fileName = $pathArr[count($pathArr) - 1];
            $file = new UploadedFile($path, $fileName);
            $key = $file->getClientOriginalName();
            $img = Image::make($file);

            if (explode('.', $fileName)[1] == "gif") {
                $width = $request['widthPx'] ?? $img->getWidth() * (1 - $request['reduce']);
                $height = $request['heightPx'] ?? $img->getHeight() * (1 - $request['reduce']);
                $degree = $request['rotates'][$key] ?? 0;

                $this->rotateGIF($file, $degree, $width, $height, $path);
                $files[] = $file;
            } else {

                if (isset($request['widthPx'])) {
                    $img->resize($request['widthPx'], $request['heightPx'])->save($path, 100);
                } else {
                    $reduce = 1 - $request['reduce'];
                    $img->resize($img->getWidth() * $reduce, $img->getHeight() * $reduce)->save($path, 100);
                }

                if (isset($request['rotates'][$key])) {
                    $img->rotate(360-$request['rotates'][$key])->save($path, 100);
                }
                $files[] = $file;
            }
            ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
            $process++;
        }
        ZipArchiveService::makeZip($files, $request['id']);
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);

    }

    public function rotate($request)
    {
        $process = 1;
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
        foreach ($request['files'] as $path) {

            $pathArr = explode('/', $path);
            $fileName = $pathArr[count($pathArr) - 1];
            $file = new UploadedFile($path, $fileName);
            $key = $file->getClientOriginalName();

            if (isset($request['rotates'][$key])) {
                $degree = $request['rotates'][$key];

                if (explode('.', $fileName)[1] == "gif") {
                    $this->rotateGIF($file,  360 -$degree, null, null, $path);
                } else {
                    Image::make($file)->rotate($degree)->save($path);
                }

            } else {
                Image::make($file)->save($path);
            }
            $files[] = $file;
            ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
            $process++;
        }

        ZipArchiveService::makeZip($files, $request['id']);
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
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
