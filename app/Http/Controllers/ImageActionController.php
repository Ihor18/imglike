<?php

namespace App\Http\Controllers;

use App\Http\Requests\HTMLImageRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\WatermarkRequest;
use App\Jobs\CompressJob;
use App\Jobs\ConvertJPEGJob;
use App\Jobs\ResizeJob;
use App\Jobs\RotateJob;
use App\Jobs\WatermarkJob;
use App\Services\CompressImageService;
use App\Services\ConvertJpegImage;
use App\Services\HTMLImageService;
use App\Services\ProccessbarService;
use App\Services\ResizeImageService;
use App\Services\WatermarkImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Exception\ProcessFailedException;


class ImageActionController extends Controller
{
    public function compress(ImageRequest $request)
    {

        $job = new CompressJob($this->getParams($request));
        $this->dispatch($job);

        return response('OK');
    }

    public function resize(ImageRequest $request)
    {
        $job = new ResizeJob($this->getParams($request));
        $this->dispatch($job);

        return response('OK');
    }

    public function rotate(ImageRequest $request)
    {
        $job = new RotateJob($this->getParams($request));
        $this->dispatch($job);

        return response('OK');

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
        $job = new WatermarkJob($this->getParams($request));
        $this->dispatch($job);
        return response('OK');
    }

    public function convertToJpeg(ImageRequest $request)
    {
        $job = new ConvertJPEGJob($this->getParams($request),'convertToJPEG');
        $this->dispatch($job);
        return response('OK');
    }

    public function convertFromJpeg(ImageRequest $request)
    {
        $job = new ConvertJPEGJob($this->getParams($request),'convertFromJPEG');
        $this->dispatch($job);
        return response('OK');
    }


    private function getParams($request)
    {
        $params = $request->all();

        if ($request->hasfile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $params['file'] = storage_path('app/' . $request->file('file')->storeAs('public/downloads', $fileName));
        }
        if ($request->hasfile('files')) {
            $files = [];
            foreach ($request->file('files') as $key => $file) {
                $fileName = $file->getClientOriginalName();
                $files[] = storage_path('app/' . $file->storeAs('public/downloads', $fileName));
            }
            $params['files'] = $files;
        }
        if ($request->hasfile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $params['image'] = storage_path('app/' . $request->file('image')->storeAs('public/downloads', $fileName));
        }

        if ($request->hasfile('watermark_file')) {
            $fileName = $request->file('watermark_file')->getClientOriginalName();
            $params['watermark_file'] = storage_path('app/' . $request->file('watermark_file')->storeAs('public/downloads', $fileName));
        }
        return $params;
    }
}
