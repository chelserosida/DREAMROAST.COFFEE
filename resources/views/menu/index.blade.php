@extends('layouts.main')

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">OUR MENU</h1>
        @if(request('search'))
            <p class="mt-3" style="color: var(--taupe);">Search results for: <strong>"{{ request('search') }}"</strong></p>
        @endif
    </div>

    <div class="container">
        @if(request('search'))
            <!-- Search Results -->
            @if($menus->count() > 0)
                <div class="row g-4 mb-5">
                    @foreach($menus as $m)
                        <div class="col-md-6">
                            <div class="card h-100" style="border: none; background: rgba(255,255,255,0.05); border-radius: 15px; overflow: hidden; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#menuModal{{ $m->id }}">
                                @if($m->image)
                                    <img src="/images/{{ $m->image }}" class="card-img-top" alt="{{ $m->name }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <div style="height: 200px; background: rgba(73,17,28,0.3); display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-coffee" style="font-size: 3rem; color: var(--taupe);"></i>
                                    </div>
                                @endif
                                
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold mb-2" style="color: var(--light);">{{ $m->name }}</h5>
                                    <p class="mb-0" style="color: var(--taupe); font-weight: 500;">{{ number_format($m->price/1000, 0) }}K</p>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for search result item -->
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
            @else
                <div class="text-center py-5">
                    <p style="font-size: 1.2rem; color: var(--taupe);">No products found matching "{{ request('search') }}"</p>
                    <a href="{{ route('menu') }}" class="btn btn-primary mt-3">View All Menu</a>
                </div>
            @endif
        @else
            <!-- Category Grid -->
            <div class="row g-4">
                @foreach($categories as $cat)
                <div class="col-md-3">
                    <a href="{{ route('categories.show', $cat->slug) }}" class="text-decoration-none">
                        <div class="card h-100" style="border: none; background: rgba(255,255,255,0.05); border-radius: 15px; overflow: hidden;">
                            @php
                                // Get first menu item with image from this category
                                $firstMenu = $cat->menus->whereNotNull('image')->first() ?? $cat->menus->first();
                            @endphp
                            
                            @if($firstMenu && $firstMenu->image)
                                <img src="/images/{{ $firstMenu->image }}" class="card-img-top" alt="{{ $cat->name }}" style="height: 200px; object-fit: cover;">
                            @else
                                <div style="height: 200px; background: rgba(73,17,28,0.3); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-coffee" style="font-size: 3rem; color: var(--taupe);"></i>
                                </div>
                            @endif
                            
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold mb-2" style="color: var(--light);">{{ $cat->name }}</h5>
                                
                                @php
                                    $menusInCat = $cat->menus;
                                    $minPrice = $menusInCat->min('price');
                                    $maxPrice = $menusInCat->max('price');
                                @endphp
                                
                                @if($menusInCat->count() > 0)
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <span style="color: #FFD700; font-size: 0.85rem;">
                                            @for($i = 0; $i < 4; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            <i class="fas fa-star-half-alt"></i>
                                        </span>
                                        <span style="color: var(--taupe); font-size: 0.9rem; margin-left: 0.25rem;">4.5/5</span>
                                    </div>
                                    
                                    @if($minPrice && $maxPrice)
                                        <p class="mb-0 mt-2" style="color: var(--taupe); font-weight: 500;">
                                            @if($minPrice == $maxPrice)
                                                {{ number_format($minPrice/1000, 0) }}K
                                            @else
                                                {{ number_format($minPrice/1000, 0) }}K - {{ number_format($maxPrice/1000, 0) }}K
                                            @endif
                                        </p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        @endif
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
