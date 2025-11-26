@extends('layouts.admin')

@section('content')
    <h2>Order #{{ $order->id }}</h2>

    <div class="mb-3">
        <strong>Customer:</strong> {{ $order->customer_name }}<br>
        <strong>Phone:</strong> {{ $order->phone }}<br>
        <strong>Address:</strong> {{ $order->address }}<br>
        <strong>Payment:</strong> {{ $order->payment_method }}<br>
        <strong>Notes:</strong> {{ $order->notes }}
    </div>

    <h5>Items</h5>
    <table class="table">
        <thead>
            <tr><th>Product</th><th>Price</th><th>Qty</th><th>Total</th></tr>
        </thead>
        <tbody>
            @foreach($order->items as $it)
                <tr>
                    <td>{{ $it->name }}</td>
                    <td>Rp {{ number_format($it->price,0,',','.') }}</td>
                    <td>{{ $it->qty }}</td>
                    <td>Rp {{ number_format($it->price * $it->qty,0,',','.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Subtotal:</strong> Rp {{ number_format($order->subtotal,0,',','.') }}</p>

    <a href="/admin/orders" class="btn btn-secondary">Back to Orders</a>

@endsection
