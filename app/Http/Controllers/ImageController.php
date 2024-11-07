<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;

class ImageController extends Controller
{
    public function upload()
    {
        $images = ImageResource::collection(Image::latest()->get());

        return view('upload', ['images' => $images]);
    }

    public function store(StoreImageRequest $request)
    {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $imagePath = $file->storeAs('images', $filename, 'public');

        Image::create([
            'filepath' => $imagePath
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
}
