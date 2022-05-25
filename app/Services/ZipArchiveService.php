<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ZipArchiveService
{
    public static function makeZip($files, $path)
    {
        $zip = new ZipArchive();
        $rootPath = storage_path('app/public/converted');

        if (!File::isDirectory($rootPath)) {
            File::makeDirectory($rootPath, 0777, true, true);
        }

        if ($zip->open(storage_path('app/public/converted/' . $path . '.zip'), ZipArchive::CREATE)) {
            foreach ($files as $file) {
                $zip->addFile($file, $file->getClientOriginalName());
            }
            $zip->close();
        }
        ZipArchiveService::clean($files);
    }

    public static function makeZipFromPath($files, $path)
    {
       $newFiles = [];
       foreach ($files as $path1){
           $pathArr = explode('/', $path1);
           $fileName = $pathArr[count($pathArr) - 1];
           $file = new UploadedFile($path1, $fileName);
           $newFiles[] = $file;
       }

       ZipArchiveService::makeZip($newFiles,$path);
    }

    private static function clean($files)
    {
        foreach ($files as $file) {
            unlink($file->getPathname());
        }
    }

}
