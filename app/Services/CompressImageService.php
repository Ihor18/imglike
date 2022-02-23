<?php


namespace App\Services;


use Illuminate\Http\Request;

use Spatie\ImageOptimizer\OptimizerChainFactory;


class CompressImageService
{

    public function compress(Request $request)
    {
        $readyImages = [];
        $request = $request->all();
        $readyImages['old-size'] = 0;
        $readyImages['new-size'] = 0;

        foreach ($request['files'] as $file) {
            if ($file->getPathname()) {


                $readyImages['old-size'] += filesize($file);
                $key = explode('.', $file->getClientOriginalName())[0];
                if (isset($request['rotates'][$key])) {
                    switch ($file->getMimeType()) {
                        case 'image/jpeg':
                            $this->rotateJPG($file, $request['rotates'][$key]);
                            break;
                        case 'image/gif':
                            (new ResizeImageService())->rotateGIF($file, $request['rotates'][$key]);
                            break;
                        case 'image/png':
                            $this->rotatePNG($file, $request['rotates'][$key]);
                            break;
                    }
                }

                $optimizerChain = OptimizerChainFactory::create();
                $optimizerChain->optimize($file->getPathname());
                $readyImages['new-size'] += filesize($file);
                $readyImages[$file->getClientOriginalName()] = base64_encode(file_get_contents($file->getPathname()));
            }
        }
        return $readyImages;
    }

    private function rotatePNG($file, $degree)
    {
        $image = imagecreatefrompng($file);
        $rotated = $this->rotate($file, $image, $degree);
        imagepng($rotated, $file->getPathname());
    }


    private function rotateJPG($file, $degree)
    {
        $image = imagecreatefromjpeg($file);
        $rotated = imagerotate($image, $degree, 0);
        imagejpeg($rotated, $file->getPathname());
    }

    private function rotate($file, $image, $degree)
    {
        $size = getimagesize($file);
        $width = $size[0];
        $height = $size[1];
        $dimg = imagecreatetruecolor($width, $height);

        $bgColor = imagecolorallocatealpha($image, 255, 255, 255, 127);
        $rotated  = imagerotate($image, $degree, $bgColor);
        imagesavealpha($rotated, true);

        return $rotated;
    }
}
