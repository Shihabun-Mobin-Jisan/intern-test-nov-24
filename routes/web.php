<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('upload');
// });

Route::get('/', [ImageController::class, 'upload'])->name('upload.index');
Route::post('/upload', [ImageController::class, 'store'])->name('upload.store');
