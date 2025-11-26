@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Left Side: Menu Items Grid -->
            <div class="col-md-7 pe-4">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb" style="background: none; padding: 0;">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--taupe); text-decoration: none;">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('menu') }}" style="color: var(--taupe); text-decoration: none;">Our Menu</a></li>
                        <li class="breadcrumb-item active" style="color: var(--light);">{{ $category->name }}</li>
                    </ol>
                </nav>

                <h2 class="display-4 fw-bold mb-4">{{ $category->name }}</h2>
                
                <div class="row g-3">
                    @foreach($menus as $m)
                        <div class="col-md-6 mb-4">
                            <div class="card" style="background: rgba(255,255,255,0.95); border: none; border-radius: 15px; overflow: hidden; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#menuModal{{ $m->id }}">
                                @if($m->image)
                                    <img src="/images/{{ $m->image }}" class="card-img-top" alt="{{ $m->name }}" style="height: 180px; object-fit: cover;">
                                @else
                                    <div style="height: 180px; background: rgba(73,17,28,0.2); display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-coffee" style="font-size: 3rem; color: var(--taupe);"></i>
                                    </div>
                                @endif
                                <div class="card-body" style="color: #000;">
                                    <h5 class="card-title fw-bold text-uppercase mb-2">{{ $m->name }}</h5>
                                    <p class="fw-bold mb-0" style="font-size: 1.1rem;">{{ number_format($m->price/1000, 0) }}K</p>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for each menu item -->
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
                                                Add to cart | {{ number_format($m->price, 0, ',', '.') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Side: Logo -->
            <div class="col-md-5 d-none d-md-block" style="position: sticky; top: 70px; height: calc(100vh - 70px);">
                <div style="height: 100%; display: flex; align-items: center; justify-content: center; padding: 2rem;">
                    <img src="/images/logo.jpg" alt="DreamRoast Coffee Logo" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 15px;">
                </div>
            </div>
        </div>
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
