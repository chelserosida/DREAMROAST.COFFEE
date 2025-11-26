<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = GalleryImage::all();
        return view('gallery', compact('gallery'));
    }
}
