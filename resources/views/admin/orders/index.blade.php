@extends('layouts.admin')

@section('content')
    <h2>Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Subtotal</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $o)
                <tr>
                    <td>{{ $o->id }}</td>
                    <td>{{ $o->customer_name }}</td>
                    <td>{{ $o->phone }}</td>
                    <td>Rp {{ number_format($o->subtotal,0,',','.') }}</td>
                    <td>{{ $o->created_at->format('Y-m-d H:i') }}</td>
                    <td><a href="/admin/orders/{{ $o->id }}" class="btn btn-sm btn-outline-primary">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orders->links() }}

@endsection
