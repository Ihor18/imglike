<?php

namespace App\Http\Controllers;

use App\Http\Requests\HTMLImageRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\WatermarkRequest;
use App\Services\CompressImageService;
use App\Services\ConvertJpegImage;
use App\Services\HTMLImageService;
use App\Services\ResizeImageService;
use App\Services\WatermarkImageService;
use Symfony\Component\Process\Exception\ProcessFailedException;


class ImageActionController extends Controller
{
    public function compress(ImageRequest $request)
    {
        $readyImages = (new CompressImageService)->compress($request);
        return response()->json($readyImages);
    }

    public function resize(ImageRequest $request)
    {
        $readyImages = (new ResizeImageService)->resize($request);
        return response()->json($readyImages);
    }

    public function rotate(ImageRequest $request)
    {
        $readyImages = (new ResizeImageService)->rotate($request->all());
        return response()->json($readyImages);
    }

    public function htmlToImage(HTMLImageRequest $request)
    {
        try {
            $response = HTMLImageService::convert($request->all());
        } catch (ProcessFailedException $exception) {
            $response = ['errors' => ['url' => 'url not found']];
        }
        return response()->json($response);
    }

    public function watermark(WatermarkRequest $request)
    {
        $readyImages = WatermarkImageService::watermark($request->all());
        return response()->json($readyImages);
    }

    public function convertToJpeg(ImageRequest $request)
    {
        $readyImages = ConvertJpegImage::toJpeg($request->all());
        return response()->json($readyImages);
    }

    public function convertFromJpeg(ImageRequest $request)
    {
        $readyImages = ConvertJpegImage::fromJpeg($request->all());
        return response()->json($readyImages);
    }
}
