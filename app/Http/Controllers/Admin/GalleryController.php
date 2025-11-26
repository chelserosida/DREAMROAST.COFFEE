<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::all();
        return view('admin.galleries.index', compact('images'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'nullable|string',
            'image' => 'required|image',
        ]);

        $file = $request->file('image');
        $name = time().'_'.preg_replace('/[^a-z0-9\.\-]/i','_', $file->getClientOriginalName());
        $file->move(public_path('images'), $name);

        GalleryImage::create(['filename'=>$name,'caption'=>$data['caption'] ?? null]);
        return redirect('/admin/galleries');
    }

    public function destroy(GalleryImage $gallery)
    {
        // delete file if exists
        $path = public_path('images/'.$gallery->filename);
        if (file_exists($path)) @unlink($path);
        $gallery->delete();
        return redirect('/admin/galleries');
    }
}
