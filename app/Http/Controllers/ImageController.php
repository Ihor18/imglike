<?php

namespace App\Http\Controllers;



class ImageController extends Controller
{
    public function rotate()
    {
        return view('pages.rotate');
    }

    public function resize()
    {
        return view('pages.resize');
    }

    public function meme()
    {
        return view('pages.mem');
    }

    public function crop()
    {
        return view('pages.crop');
    }

    public function watermark()
    {
        return view('pages.watermark');
    }

    public function htmlToImage()
    {
        return view('pages.html_to_image');
    }

    public function convertInJpg()
    {
        return view('pages.convert_in');
    }

    public function convertFromJpg()
    {
        return view('pages.convert_from');
    }

    public function compress()
    {
        return view('pages.compress');
    }

    public function redactor(){

    }
}
