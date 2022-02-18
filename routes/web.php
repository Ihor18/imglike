<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageActionController;

use App\Services\HTMLImageService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$prefix = App\Http\Middleware\LocaleMiddleware::getLocale();

Route::group(['prefix' => "$prefix"], function () {

    Route::any('/test', function () {

    });
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/rotate', [ImageController::class, 'rotate'])->name('rotate');
    Route::get('/resize', [ImageController::class, 'resize'])->name('resize');
    Route::get('/meme-generator', [ImageController::class, 'meme'])->name('meme');
    Route::get('/crop', [ImageController::class, 'crop'])->name('crop');
    Route::get('/watermark', [ImageController::class, 'watermark'])->name('watermark');
    Route::get('/html-to-image', [ImageController::class, 'htmlToImage'])->name('html-to-image');
    Route::get('/redactor', [ImageController::class, 'redactor'])->name('redactor');
    Route::get('/convert-in-jpg', [ImageController::class, 'convertInJpg'])->name('convert-in-jpg');
    Route::get('/convert-from-jpg', [ImageController::class, 'convertFromJpg'])->name('convert-from-jpg');
    Route::get('/photoshop', [ImageController::class, 'photoshop'])->name('photoshop');
    Route::get('/compress', [ImageController::class, 'compress'])->name('compress');


    //Action
    Route::post('/compress-image', [ImageActionController::class, 'compress'])->name('compress-image');
    Route::post('/resize-image', [ImageActionController::class, 'resize'])->name('resize-image');
    Route::post('/rotate-image', [ImageActionController::class, 'rotate'])->name('rotate-image');
    Route::post('/convert-html', [ImageActionController::class, 'htmlToImage'])->name('convert-html');
    Route::post('/make-watermark', [ImageActionController::class, 'watermark'])->name('make-watermark');
    Route::post('/convert-from', [ImageActionController::class, 'convertFromJpeg'])->name('convert-from');
    Route::post('/convert-to', [ImageActionController::class, 'convertToJpeg'])->name('convert-to');

    Route::get('/auth/google', 'App\Http\Controllers\GoogleController@redirectToGoogle')->name('auth-google');
    Route::get('/auth/google/callback', 'App\Http\Controllers\GoogleController@handleGoogleCallback');
    require __DIR__ . '/auth.php';
});

