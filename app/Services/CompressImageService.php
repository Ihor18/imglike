<?php


namespace App\Services;


use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class CompressImageService
{

    public function compress($request)
    {

        $process = 1;
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
        $oldSize = 0;
        $newSize = 0;
        $files = [];
        foreach ($request['files'] as $path) {

            $pathArr = explode('/', $path);
            $fileName = $pathArr[count($pathArr) - 1];
            $file = new UploadedFile($path, $fileName);

            $oldSize += filesize($file);
            $key = $file->getClientOriginalName();

            if (isset($request['rotates'][$key])) {
                Log::info($request['rotates'][$key]);
                switch ($file->getMimeType()) {
                    case 'image/jpeg':
                        $this->rotateJPG($file, $request['rotates'][$key], $path);
                        break;
                    case 'image/gif':
                        (new ResizeImageService())->rotateGIF($file, $request['rotates'][$key], null, null, $path);
                        break;
                    case 'image/png':
                        $this->rotatePNG($file, $request['rotates'][$key], $path);
                        break;
                }
            }
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($file->getPathname());
            $newSize += filesize($file);
            $files[] = $file;
            ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);
            $process++;
        }

        ZipArchiveService::makeZip($files, $request['id']);
        ProccessbarService::writeToFile('compress/' . $request['id'] . '.txt', $oldSize . ' ' . $newSize);
        ProccessbarService::writeToFile('text/' . $request['id'] . '.txt', $process);

    }

    private function rotatePNG($file, $degree, $path)
    {

        $image = imagecreatefrompng($file);
        $rotated = $this->rotate($file, $image, 360 - $degree);
        imagepng($rotated, $path,0);
    }


    private function rotateJPG($file, $degree, $path)
    {
        $image = imagecreatefromjpeg($file);
        $rotated = imagerotate($image, 360-$degree, 0);
        imagejpeg($rotated, $path, 100);
    }

    private function rotate($file, $image, $degree)
    {
        $size = getimagesize($file);
        $width = $size[0];
        $height = $size[1];
        $dimg = imagecreatetruecolor($width, $height);

        $bgColor = imagecolorallocatealpha($image, 255, 255, 255, 127);
        $rotated = imagerotate($image, $degree, $bgColor);
        imagesavealpha($rotated, true);

        return $rotated;
    }
}
