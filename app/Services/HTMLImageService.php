<?php


namespace App\Services;

use Spatie\Browsershot\Browsershot;

class HTMLImageService
{
    public static function convert($request)
    {
        $width = $request['width'];
        $height = $request['height'];
        $screen = Browsershot::url($request['url'])->setNodeModulePath('/usr/lib/node_modules')
            ->setOption('viewport', ['width' => intval($width), 'height' => intval($height)]);

        !empty($request['add-block']) && $screen->disableJavascript();
        !empty($request['pop-up']) && $screen->dismissDialogs();
        !empty($request['full-page']) && $screen->fullPage();

        if ($request['format'] == 'pdf') {
            $data['converted.pdf'] = $screen->base64pdf();
        } else {
            $data['converted.' . $request['format']] = $request['format'] == 'jpg' ? $screen->setScreenshotType('jpeg', 100)->base64Screenshot() :
                $screen->base64Screenshot();
        }

        return $data;
    }

}

