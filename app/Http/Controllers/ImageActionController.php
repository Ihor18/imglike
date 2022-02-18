<?php

namespace App\Http\Controllers;

use App\Services\CompressImageService;
use App\Services\ResizeImageService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Intervention\Image\File;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ImageActionController extends Controller
{


    public function compress(Request $request)
    {
        $readyImages =  (new CompressImageService)->compress($request);
        return response()->json($readyImages);
    }

    public function resize(Request $request)
    {
        $readyImages =  ResizeImageService::resize($request);
        return response()->json($readyImages);
    }

    public function rotate(Request $request){
        $readyImages = [];
        foreach ($request->file('files') as &$file) {
            $key = explode('.', $file->getClientOriginalName())[0];

            if (isset($request->rotates[$key])) {
                $img = Image::make($file)->rotate($request->rotates[$key])->encode();
            } else {
                $img = Image::make($file)->encode();
            }
            $readyImages[$file->getClientOriginalName()] = base64_encode($img);
        }
        return $readyImages;
    }

    public function htmlToImage(Request $request){

    }
}
