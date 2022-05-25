<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class ConvertJpegImage
{
    public static function toJpeg($request)
    {
        $process = 1;
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
        foreach ($request['files'] as $path) {
            $pathArr = explode('/', $path);
            $fileName = $pathArr[count($pathArr) - 1];
            $file = new UploadedFile($path, $fileName);
            $newFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.jpg';
            $newPath = storage_path('app/public/downloads/'.$newFileName);

            Image::make($file)->encode('jpg')->save($newPath);
            $files[] = $newPath;
            ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
            $process++;
            unlink($file->getPathname());
        }
        ZipArchiveService::makeZipFromPath($files, $request['id']);
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
    }

    public static function fromJpeg($request)
    {
        $process = 1;
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);

        if ($request['format'] == 'png') {
            foreach ($request['files'] as $path) {
                $pathArr = explode('/', $path);
                $fileName = $pathArr[count($pathArr) - 1];
                $file = new UploadedFile($path, $fileName);
                $newFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.png';
                $newPath = storage_path('app/public/downloads/'.$newFileName);

                Image::make($file)->encode('png')->save($newPath);
                $files[] = $newPath;
                ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
                $process++;
                unlink($file->getPathname());
            }
        } else {
            if ($request['type'] == 'static') {
                foreach ($request['files'] as $path) {
                    $pathArr = explode('/', $path);
                    $fileName = $pathArr[count($pathArr) - 1];
                    $file = new UploadedFile($path, $fileName);
                    $newFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.gif';
                    $newPath = storage_path('app/public/downloads/'.$newFileName);

                     Image::make($file)->encode('gif')->save($newPath);
                    $files[] = $newPath;
                    unlink($file->getPathname());
                    ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
                    $process++;
                }
            } else {
                info(2);
                if ($request['save_prop']) {
                    $pathArr = explode('/', $request['files'][0]);
                    $fileName = $pathArr[count($pathArr) - 1];
                    $firstFile = $file = new UploadedFile($request['files'][0], $fileName);
                    $data = getimagesize($firstFile);
                    $width = $data[0];
                    $height = $data[1];
                    foreach ($request['files'] as $path) {

                        $pathArr = explode('/', $path);
                        $fileName = $pathArr[count($pathArr) - 1];
                        $file = new UploadedFile($path, $fileName);

                        $newSize = getimagesize($file);
                        if ($newSize[0] < $width) {
                            $width = $newSize[0];
                            $height = $newSize[1];
                        }
                    }
                    foreach ($request['files'] as $path) {
                        $pathArr = explode('/', $path);
                        $fileName = $pathArr[count($pathArr) - 1];
                        $file = new UploadedFile($path, $fileName);
                        $newFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.gif';
                        $newPath = storage_path('app/public/downloads/'.$newFileName);
                        Image::make($file)->resize($width, $height)->save($newPath);
                        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
                        $process++;
                    }
                }
                foreach ($request['files'] as $path) {
                    $frames[] = $path;
                }
                $newFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.gif';
                $newPath = storage_path('app/public/downloads/'.$newFileName);
                $anim = new AnimatedGIF();
                $anim->create($frames, array($request['duration'] * 100));
                $anim->save($newPath);
                $files[] = $newPath;

            }
        }
        ZipArchiveService::makeZipFromPath($files, $request['id']);
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
    }
}
