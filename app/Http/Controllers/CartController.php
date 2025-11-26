<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
    // Show cart page
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += ($item['price'] * $item['qty']);
        }
        return view('cart.index', compact('cart', 'subtotal'));
    }

    // Add item to cart (expects menu_id and qty)
    public function add(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|integer|exists:menus,id',
            'qty' => 'nullable|integer|min:1'
        ]);

        $menu = Menu::find($request->input('menu_id'));
        $qty = max(1, (int) $request->input('qty', 1));

        $cart = $request->session()->get('cart', []);

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['qty'] += $qty;
        } else {
            $cart[$menu->id] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => (float) $menu->price,
                'qty' => $qty,
                'image' => $menu->image ?? null,
            ];
        }

        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item added to cart');
    }

    // Update quantities: expects items array [id => qty]
    public function update(Request $request)
    {
        $items = $request->input('items', []);
        $cart = $request->session()->get('cart', []);
        foreach ($items as $id => $qty) {
            if (isset($cart[$id])) {
                $qty = max(0, (int) $qty);
                if ($qty === 0) {
                    unset($cart[$id]);
                } else {
                    $cart[$id]['qty'] = $qty;
                }
            }
        }
        $request->session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success','Cart updated');
    }

    // Remove single item
    public function remove(Request $request)
    {
        $id = $request->input('menu_id');
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success','Item removed');
    }

    // Clear cart
    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->route('cart.index')->with('success','Cart cleared');
    }
}
