<?php

use App\Http\Middleware\LocaleMiddleware;

if (! function_exists('getUrl')) {
    function getUrl($lang) {
        $url = url()->full();
        $segmentsUrl = explode('/',$url);

        if (!empty($segmentsUrl[3]) && in_array($segmentsUrl[3], LocaleMiddleware::$languages)) {
            if ($lang == LocaleMiddleware::$mainLanguage) {
                unset($segmentsUrl[3]);
            } else {
                $segmentsUrl[3] = $lang;
            }
            $segmentsUrl = implode('/', $segmentsUrl);
            return $segmentsUrl;
        } else {
            if ($lang != LocaleMiddleware::$mainLanguage) {
                array_splice($segmentsUrl, 3, 0, $lang);
            }
            $segmentsUrl = implode('/', $segmentsUrl);
            return $segmentsUrl;
        }
    }
}
if (! function_exists('formatSizeUnits')) {
    function formatSizeUnits($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
    }
}
if (! function_exists('secondsToTime')) {
    function secondsToTime($s)
    {
        $h = floor($s / 3600);
        $s -= $h * 3600;
        $m = floor($s / 60);
        $s -= $m * 60;
        $h = $h?$h.'h ':'';
        $m = $m?sprintf('%02d', $m).'m ':'';
        $s = $s.'s';

        return $h.$m.$s;
    }
}
if (! function_exists('formatMimeType')) {
    function formatMimeType($mimeType)
    {
        if(str_contains($mimeType, 'audio') && str_contains($mimeType, 'mp4a')){
            return 'm4a';
        }
        if(str_contains($mimeType, 'mp4')){
            return 'mp4';
        }
        if(str_contains($mimeType, 'webm')){
            return 'webm';
        }
        return 'txt';
    }
}
if (! function_exists('translit_sef')) {
    function translit_sef($value)
    {
        $converter = array(
            '??' => 'a',    '??' => 'b',    '??' => 'v',    '??' => 'g',    '??' => 'd',
            '??' => 'e',    '??' => 'e',    '??' => 'zh',   '??' => 'z',    '??' => 'i',
            '??' => 'y',    '??' => 'k',    '??' => 'l',    '??' => 'm',    '??' => 'n',
            '??' => 'o',    '??' => 'p',    '??' => 'r',    '??' => 's',    '??' => 't',
            '??' => 'u',    '??' => 'f',    '??' => 'h',    '??' => 'c',    '??' => 'ch',
            '??' => 'sh',   '??' => 'sch',  '??' => '',     '??' => 'y',    '??' => '',
            '??' => 'e',    '??' => 'yu',   '??' => 'ya',
        );
        $value = mb_strtolower($value);
        $value = strtr($value, $converter);
        $value = mb_ereg_replace('[^-0-9a-z]', '-', $value);
        $value = mb_ereg_replace('[-]+', '-', $value);
        $value = trim($value, '-');
        return $value;
    }
}
