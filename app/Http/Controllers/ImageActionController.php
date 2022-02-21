<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompressImageRequest;
use App\Services\CompressImageService;
use App\Services\ConvertJpegImage;
use App\Services\HTMLImageService;
use App\Services\ResizeImageService;
use App\Services\WatermarkImageService;
use Illuminate\Http\Request;


class ImageActionController extends Controller
{
    public function compress(CompressImageRequest $request)
    {
        $readyImages = (new CompressImageService)->compress($request);
        return response()->json($readyImages);
    }

    public function resize(Request $request)
    {
        $readyImages = (new ResizeImageService)->resize($request);
        return response()->json($readyImages);
    }

    public function rotate(Request $request)
    {
        $readyImages = (new ResizeImageService)->rotate($request->all());
        return response()->json($readyImages);
    }

    public function htmlToImage(Request $request)
    {
        $readyImages = HTMLImageService::convert($request->all());
        return response()->json($readyImages);
    }

    public function watermark(Request $request)
    {
        $readyImages = WatermarkImageService::watermark($request->all());
        return response()->json($readyImages);
    }

    public function convertToJpeg(Request $request)
    {
        $readyImages = ConvertJpegImage::toJpeg($request->all());
        return response()->json($readyImages);
    }

    public function convertFromJpeg(Request $request)
    {
        $readyImages = ConvertJpegImage::fromJpeg($request->all());
        return response()->json($readyImages);
    }
}
