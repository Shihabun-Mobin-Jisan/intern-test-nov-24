<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;



Route::get('/', function () {
    return view('upload');
  
});

Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('image.upload');
