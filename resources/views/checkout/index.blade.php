@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Your Checkout</h2>

            <form method="POST" action="{{ route('checkout.place') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes (optional)</label>
                    <textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Payment Method</label>
                    <select name="payment" class="form-select" required>
                        <option value="cash">Cash on Delivery</option>
                        <option value="bank">Bank Transfer</option>
                        <option value="ovo">OVO / e-Wallet</option>
                    </select>
                </div>

                <button class="btn btn-primary">Place Order</button>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Order Summary</h5>
                    <hr>
                    @if(empty($cart))
                        <p>No items in cart.</p>
                    @else
                        @foreach($cart as $item)
                            <div class="d-flex mb-2">
                                <div class="flex-grow-1">
                                    <strong>{{ $item['name'] }}</strong>
                                    <div class="text-muted">Rp {{ number_format($item['price'],0,',','.') }} x {{ $item['qty'] }}</div>
                                </div>
                                <div>
                                    <strong>Rp {{ number_format($item['price'] * $item['qty'],0,',','.') }}</strong>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <p>Subtotal: <strong>Rp {{ number_format($subtotal,0,',','.') }}</strong></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
