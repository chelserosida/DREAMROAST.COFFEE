<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Bean;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $menusCount = Menu::count();
        $beansCount = Bean::count();
        $messagesCount = Message::count();

        return view('admin.dashboard', compact('menusCount','beansCount','messagesCount'));
    }
}
