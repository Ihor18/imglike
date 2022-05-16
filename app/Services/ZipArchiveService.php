<?php

namespace App\Services;

use ZipArchive;

class ZipArchiveService
{
    public static function makeZip($files, $path)
    {
        $zip = new ZipArchive();
        if ($zip->open(storage_path('app/public/' . $path . '.zip'), ZipArchive::CREATE)) {
            foreach ($files as $file) {
                $zip->addFile($file, $file->getClientOriginalName());
            }
            $zip->close();
        }
    }

    public static function makeZipFromPath($files, $path)
    {
        $zip = new ZipArchive();
        if ($zip->open(storage_path('app/public/' . $path . '.zip'), ZipArchive::CREATE)) {
            foreach ($files as $file) {
                $zip->addFile(storage_path('app/public/'.$file),$file);
            }
            $zip->close();
            foreach ($files as $file) {
                if(file_exists(storage_path('app/public/'.$file)))
                unlink(storage_path('app/public/'.$file));
            }
        }
    }

}
