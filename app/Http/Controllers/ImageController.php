<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

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

        // $imagePath = $request->file('image')->store('images', 'public');

        $imagePath = $file->storeAs('images', $filename, 'public');

        Image::create([
            'filepath' => $imagePath
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
}
