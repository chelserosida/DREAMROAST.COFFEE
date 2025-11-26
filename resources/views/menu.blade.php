@extends('layouts.main')

@section('content')
    <div class="row align-items-center mb-5">
        <div class="col-md-8">
            <h1 class="display-4 fw-bold">OUR MENU</h1>
        </div>
        <div class="col-md-4 text-end">
            <img src="/images/logo.jpg" alt="DreamRoast Coffee Logo" style="max-width: 150px; height: auto; border-radius: 15px;">
        </div>
    </div>

    <div class="container-fluid">
        <!-- Group menus by category -->
        @php
            $menusByCategory = $menus->groupBy('category.name');
        @endphp

        @foreach($menusByCategory as $categoryName => $categoryMenus)
            <div class="mb-5">
                <h3 class="mb-4" style="color: var(--taupe);">{{ $categoryName }}</h3>
                <div class="row g-4">
                    @foreach($categoryMenus as $m)
                        <div class="col-md-6">
                            <div class="card h-100" style="border: none; background: rgba(255,255,255,0.05); border-radius: 15px; overflow: hidden; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#menuModal{{ $m->id }}">
                                @if($m->image)
                                    <img src="/images/{{ $m->image }}" class="card-img-top" alt="{{ $m->name }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <div style="height: 200px; background: rgba(73,17,28,0.3); display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-coffee" style="font-size: 3rem; color: var(--taupe);"></i>
                                    </div>
                                @endif
                                
                                <div class="card-body text-center d-flex flex-column justify-content-between" style="min-height: 100px;">
                                    <h5 class="card-title fw-bold mb-2 text-uppercase" style="color: var(--light); min-height: 48px; display: flex; align-items: center; justify-content: center;">{{ $m->name }}</h5>
                                    <p class="mb-0" style="color: var(--taupe); font-weight: 500; font-size: 1.1rem;">{{ number_format($m->price/1000, 0) }}K</p>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for menu item -->
                        <div class="modal fade" id="menuModal{{ $m->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="background: #F5F5F5; border-radius: 25px; border: none;">
                                    <div class="modal-header border-0 pb-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center px-4 pb-4">
                                        <h3 class="fw-bold mb-4" style="color: #000;">{{ $m->name }}</h3>
                                        
                                        @if($m->image)
                                            <img src="/images/{{ $m->image }}" alt="{{ $m->name }}" style="width: 250px; height: 250px; object-fit: cover; border-radius: 20px; margin-bottom: 2rem;">
                                        @endif
                                        
                                        <div class="mb-4">
                                            <h5 style="color: #000;">{{ $categoryName }}</h5>
                                            <p style="color: var(--burgundy); font-weight: 600; font-size: 1.2rem;">Rp {{ number_format($m->price, 0, ',', '.') }}/{{ $m->price_per }}</p>
                                        </div>
                                        
                                        <form method="POST" action="{{ route('cart.add') }}">
                                            @csrf
                                            <input type="hidden" name="menu_id" value="{{ $m->id }}">
                                            
                                            <h5 class="mb-3" style="color: #000;">Quantity</h5>
                                            <div class="d-flex justify-content-center align-items-center mb-4">
                                                <button type="button" class="btn btn-light rounded-circle" style="width: 45px; height: 45px; border: 2px solid #ddd;" onclick="decreaseQty({{ $m->id }})">
                                                    <strong>−</strong>
                                                </button>
                                                <input type="number" name="qty" id="qty{{ $m->id }}" value="1" min="1" readonly class="form-control text-center mx-3" style="max-width: 80px; border: none; background: transparent; font-size: 1.2rem; font-weight: bold; color: #000;">
                                                <button type="button" class="btn btn-light rounded-circle" style="width: 45px; height: 45px; border: 2px solid #ddd;" onclick="increaseQty({{ $m->id }})">
                                                    <strong>+</strong>
                                                </button>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-dark w-100 py-3 fw-bold" style="border-radius: 15px; font-size: 1.1rem;">
                                                Add to cart | Rp {{ number_format($m->price, 0, ',', '.') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function increaseQty(menuId) {
            const input = document.getElementById('qty' + menuId);
            input.value = parseInt(input.value) + 1;
        }
        
        function decreaseQty(menuId) {
            const input = document.getElementById('qty' + menuId);
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>

@endsection
