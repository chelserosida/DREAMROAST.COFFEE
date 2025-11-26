@extends('layouts.main')

@section('content')
    <h2>Roasted Beans Catalogue</h2>
    <div class="row">
        @foreach($beans as $b)
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>{{ $b->name }}</h5>
                        <p>Type: {{ $b->type }}</p>
                        <p>Price: {{ $b->price_per }}</p>
                        <p>{{ $b->notes }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
