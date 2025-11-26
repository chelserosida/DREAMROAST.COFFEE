@extends('layouts.main')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb" style="background: transparent; padding: 0;">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--taupe);">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cart.index') }}" style="color: var(--taupe);">Cart</a></li>
            <li class="breadcrumb-item active" style="color: var(--light);">Cart</li>
        </ol>
    </nav>

    <h1 class="mb-4" style="font-size: 2.5rem; font-weight: 700;">Your cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-lg-7">
            @if(empty($cart))
                <div class="text-center py-5">
                    <p style="font-size: 1.2rem;">Your cart is empty.</p>
                    <a href="{{ route('menu') }}" class="btn btn-primary mt-3">Browse Menu</a>
                </div>
            @else
                <form method="POST" action="{{ route('cart.update') }}">
                    @csrf
                    @foreach($cart as $id => $item)
                        <div class="card mb-3" style="background-color: var(--light); border: none; border-radius: 12px;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center">
                                    <div style="width: 120px; height: 120px; flex-shrink: 0;">
                                        @if(!empty($item['image']))
                                            <img src="/images/{{ $item['image'] }}" class="rounded" style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $item['name'] }}">
                                        @else
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
                                                <span style="color: #666;">No image</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="flex-grow-1 ms-4">
                                        <h5 class="mb-1" style="color: #000; font-weight: 700; font-size: 1.1rem;">{{ strtoupper($item['name']) }}</h5>
                                        <p class="mb-1" style="color: #666; font-size: 0.9rem;">Size: Regular</p>
                                        <p class="mb-0" style="color: #666; font-size: 0.9rem;">Ice : No</p>
                                        <p class="mb-0 mt-2" style="color: #000; font-weight: 700; font-size: 1.1rem;">{{ number_format($item['price'],0,',','.') }}</p>
                                    </div>
                                    
                                    <div class="d-flex flex-column align-items-end">
                                        <button type="submit" formaction="{{ route('cart.remove') }}" formmethod="POST" name="menu_id" value="{{ $id }}" class="btn btn-link text-danger p-0 mb-3" style="font-size: 1.2rem;">
                                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                        
                                        <div class="d-flex align-items-center" style="background-color: #f0f0f0; border-radius: 20px; padding: 5px 15px;">
                                            <button type="button" class="btn btn-link p-0 text-dark" style="font-size: 1.2rem; text-decoration: none;" onclick="this.nextElementSibling.stepDown(); this.nextElementSibling.form.requestSubmit();">−</button>
                                            <input type="number" name="items[{{ $id }}]" value="{{ $item['qty'] }}" min="1" class="form-control text-center mx-2" style="width: 50px; border: none; background: transparent; color: #000; font-weight: 700;" readonly>
                                            <button type="button" class="btn btn-link p-0 text-dark" style="font-size: 1.2rem; text-decoration: none;" onclick="this.previousElementSibling.stepUp(); this.previousElementSibling.form.requestSubmit();">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            @endif
        </div>

        <div class="col-lg-5">
            <div class="card" style="background-color: var(--light); border: none; border-radius: 12px; position: sticky; top: 100px;">
                <div class="card-body p-4">
                    <h4 class="mb-4" style="color: #000; font-weight: 700;">Order Summary</h4>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span style="color: #666;">Subtotal</span>
                        <strong style="color: #000;">{{ number_format($subtotal,0,',','.') }}</strong>
                    </div>
                    
                    <hr style="border-color: #ddd;">
                    
                    <div class="d-flex justify-content-between mb-4">
                        <span style="color: #000; font-weight: 700; font-size: 1.1rem;">Total</span>
                        <strong style="color: #000; font-size: 1.3rem;">{{ number_format($subtotal,0,',','.') }}</strong>
                    </div>
                    
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: #f0f0f0; border: none;">
                                <svg width="16" height="16" fill="#666" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.5A1.5 1.5 0 0 1 15 6.5v3a1.5 1.5 0 0 1-1.5 1.5H13v1.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 1 12.5v-9zm2 8.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5z"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Add promo code" style="background-color: #f0f0f0; border: none; color: #000;">
                            <button class="btn" style="background-color: #000; color: #fff; border: none; border-radius: 0 8px 8px 0; padding: 0 30px;">Apply</button>
                        </div>
                    </div>
                    
                    <a href="{{ route('checkout.index') }}" class="btn w-100 py-3" style="background-color: #000; color: #fff; border-radius: 25px; font-weight: 700; font-size: 1.1rem;">
                        Go to Checkout →
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
