<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Bean;
use App\Models\GalleryImage;

class HomeController extends Controller
{
    public function index()
    {
        $menu = Menu::latest()->take(4)->get();
        $beans = Bean::latest()->take(4)->get();
        $gallery = GalleryImage::latest()->take(6)->get();
        return view('home', compact('menu','beans','gallery'));
    }
}
