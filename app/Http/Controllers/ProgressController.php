<?php

namespace App\Http\Controllers;

use App\Services\CompressImageService;
use App\Services\ProccessbarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProgressController extends Controller
{
    public function compress(Request $request)
    {
        $request = $request->all();

        $rootPath = storage_path('app/public/');

        if (!File::isFile($rootPath.'text/'.$request['id'] . '.txt') ||
            !File::isFile($rootPath.'compress/'.$request['id'] . '.txt')) {
            return response('In process...');
        }

        $progress = ProccessbarService::getFromFile('text/' . $request['id'] . '.txt');

        if ($request['maxNumber'] == $progress) {
            $size = explode(' ', ProccessbarService::getFromFile('compress/' . $request['id'] . '.txt'));

            $baseZip = base64_encode(ProccessbarService::getFromFile('converted/' . $request['id'] . '.zip'));

            ProccessbarService::removeFile('text/' . $request['id'] . '.txt');
            ProccessbarService::removeFile('converted/' . $request['id'] . '.zip');
            ProccessbarService::removeFile('compress/' . $request['id'] . '.txt');

            return response()->json([
                'action' => 'end',
                'old' => $size[0],
                'new' => $size[1],
                'compressed.zip' => $baseZip
            ]);
        }
        return response()->json([
            'action' => 'progress',
            'progress' => $progress]);
    }

    public function getProgress(Request $request){
        $request = $request->all();

        $rootPath = storage_path('app/public/text/' . $request['id'] . '.txt');

        if (!File::isFile($rootPath)) {
            return response('In process...');
        }

        $progress = ProccessbarService::getFromFile('text/' . $request['id'] . '.txt');

        if ($request['maxNumber'] == $progress) {

            $baseZip = base64_encode(ProccessbarService::getFromFile('converted/' . $request['id'] . '.zip'));

            ProccessbarService::removeFile('text/' . $request['id'] . '.txt');
            ProccessbarService::removeFile('converted/' . $request['id'] . '.zip');

            return response()->json([
                'action' => 'end',
                $request['name'] => $baseZip
            ]);
        }
        return response()->json([
            'action' => 'progress',
            'progress' => $progress]);
    }

}
