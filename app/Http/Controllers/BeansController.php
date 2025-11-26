<?php

namespace App\Http\Controllers;

use App\Models\Bean;

class BeansController extends Controller
{
    public function index()
    {
        $beans = Bean::all();
        return view('beans', compact('beans'));
    }
}
