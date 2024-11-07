<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        $images = Image::all();  
        return view('upload', compact('images'));
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png|max:2048'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        
        Image::create(['filepath' => $imagePath]);

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }
}

