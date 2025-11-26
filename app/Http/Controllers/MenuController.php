<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $categories = Category::with('menus')->get();
        
        if ($search) {
            $menus = Menu::where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->latest()
                        ->get();
        } else {
            $menus = Menu::latest()->get();
        }
        
        return view('menu.index', compact('categories', 'menus', 'search'));
    }
}
