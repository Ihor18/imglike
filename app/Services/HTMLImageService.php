<?php


namespace App\Services;

use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;


class HTMLImageService
{
    public static function convert($request)
    {
        $width = $request['width'];
        $height = $request['height'];
        $screen = Browsershot::url($request['url'])
            ->setNodeModulePath(base_path('node_modules'))
            ->setOption('viewport', ['width' => intval($width), 'height' => intval($height)])
            ->waitUntilNetworkIdle();


        !empty($request['add-block']) && $request['add-block']!='false' && $screen->disableJavascript();
        !empty($request['pop-up']) && $request['pop-up']!='false' && $screen->dismissDialogs();
        !empty($request['full-page']) && $request['full-page']!="false" && $screen->fullPage();

        switch ($request['format']){
            case 'pdf':
                $data['converted.pdf'] = $screen->base64pdf();
                break;
            case 'jpg':
                $data['converted.jpg'] = $screen->setScreenshotType('jpeg', 100)->base64Screenshot();
                break;
            case 'png':
                $data['converted.png'] = $screen->base64Screenshot();
                break;
        }

        return $data;
    }

}

