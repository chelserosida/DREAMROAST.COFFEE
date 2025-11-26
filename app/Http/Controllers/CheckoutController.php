<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += ($item['price'] * $item['qty']);
        }
        return view('checkout.index', compact('cart','subtotal'));
    }

    public function place(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:1000',
            'notes' => 'nullable|string|max:1000',
            'payment' => 'required|string'
        ]);

        $cart = $request->session()->get('cart', []);
        $subtotal = array_reduce($cart, function($carry, $item){
            return $carry + ($item['price'] * $item['qty']);
        }, 0);

        // Save to database if models exist
        try {
            $order = \App\Models\Order::create([
                'customer_name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'notes' => $data['notes'] ?? null,
                'payment_method' => $data['payment'],
                'subtotal' => $subtotal,
            ]);

            foreach ($cart as $item) {
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['id'] ?? null,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                ]);
            }

            $request->session()->put('last_order_id', $order->id);
        } catch (\Throwable $e) {
            // Fallback: store order in session if DB not available
            $request->session()->put('last_order', [
                'customer' => $data,
                'items' => $cart,
                'subtotal' => $subtotal,
            ]);
        }

        $request->session()->forget('cart');
        return redirect()->route('checkout.thankyou');
    }

    public function thankyou()
    {
        return view('checkout.thankyou');
    }
}
