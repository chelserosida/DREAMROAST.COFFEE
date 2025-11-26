@extends('layouts.main')

@section('content')
    <div class="row align-items-stretch">
        <div class="col-md-8">
            <div class="p-5 bg-light rounded-3 h-100 d-flex flex-column justify-content-center">
                <h1 class="display-6">Dream Roast Coffee</h1>
                <p class="lead">Specialty coffee, roasted with care. Welcome to Dream Roast Coffee.</p>
                <a class="btn btn-primary" href="{{ route('menu') }}">See Menu</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="h-100 d-flex align-items-center justify-content-center p-3">
                <img src="/images/logo.jpg" alt="DreamRoast Coffee Logo" style="max-width: 100%; height: auto; border-radius: 15px;">
            </div>
        </div>
    </div>

    <h3 class="mt-5">Top Beans</h3>
    <div class="row">
        @foreach($beans as $b)
            <div class="col-md-6 mb-3">
                <div class="card h-100" style="background: rgba(255,255,255,0.05); border: none; border-radius: 15px; overflow: hidden;">
                    @php
                        // Map bean name to image file
                        $imageName = strtolower($b->name);
                        $imageName = str_replace(' - ', ' ', $imageName);
                        $imageName = str_replace(' ', ' ', $imageName);
                        
                        // Try to find matching image
                        $possibleImages = [
                            'arabica kawi natural.jpg',
                            'arabica kawi anaerob.jpg',
                            'arabica kawi mossto.jpg',
                            'robusta bondowoso.jpg',
                            'excelsa sumber putih anaerob.jpg',
                        ];
                        
                        $foundImage = null;
                        foreach($possibleImages as $img) {
                            if(stripos($img, $b->type) !== false || stripos($b->name, str_replace('.jpg', '', $img)) !== false) {
                                $foundImage = $img;
                                break;
                            }
                        }
                    @endphp
                    
                    @if($foundImage)
                        <img src="/images/{{ $foundImage }}" alt="{{ $b->name }}" style="width: 100%; height: 150px; object-fit: cover;">
                    @else
                        <div style="width: 100%; height: 150px; background: rgba(73,17,28,0.3); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-coffee" style="font-size: 2rem; color: var(--taupe);"></i>
                        </div>
                    @endif
                    
                    <div class="card-body text-center">
                        <strong style="display: block; margin-bottom: 0.5rem;">{{ $b->name }}</strong>
                        <div style="color: var(--taupe); font-weight: 600;">{{ $b->price_per }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h3 class="mt-4">Gallery</h3>
    <div class="row">
        @foreach($gallery as $g)
            <div class="col-md-2">
                <img src="/images/{{ $g->filename }}" class="img-fluid rounded mb-2" alt="{{ $g->caption }}">
            </div>
        @endforeach
    </div>

@endsection
