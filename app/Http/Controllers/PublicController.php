<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Bean;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $menu = Menu::latest()->take(4)->get();
        $beans = Bean::latest()->take(4)->get();
        $gallery = GalleryImage::latest()->take(6)->get();
        return view('home', compact('menu','beans','gallery'));
    }

    public function menu()
    {
        $menus = Menu::with('category')->get();
        return view('menu', compact('menus'));
    }

    public function beans()
    {
        $beans = Bean::all();
        return view('beans', compact('beans'));
    }

    public function about()
    {
        return view('about');
    }

    public function gallery()
    {
        $gallery = GalleryImage::all();
        return view('gallery', compact('gallery'));
    }

    public function contact()
    {
        return view('contact');
    }
}
