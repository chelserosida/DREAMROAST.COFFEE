<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bean;
use Illuminate\Http\Request;

class BeanController extends Controller
{
    public function index()
    {
        $beans = Bean::all();
        return view('admin.beans.index', compact('beans'));
    }

    public function create()
    {
        return view('admin.beans.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'nullable|string',
            'price_per' => 'nullable|string',
        ]);

        Bean::create($data);
        return redirect('/admin/beans');
    }

    public function edit(Bean $bean)
    {
        return view('admin.beans.edit', compact('bean'));
    }

    public function update(Request $request, Bean $bean)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'nullable|string',
            'price_per' => 'nullable|string',
        ]);
        $bean->update($data);
        return redirect('/admin/beans');
    }

    public function destroy(Bean $bean)
    {
        $bean->delete();
        return redirect('/admin/beans');
    }
}
