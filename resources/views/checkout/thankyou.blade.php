@extends('layouts.main')

@section('content')
    <div class="text-center py-5">
        <h2>Thank you — your order has been placed</h2>
        <p class="lead">We have received your order and will contact you shortly.</p>
        <a class="btn btn-primary" href="{{ route('home') }}">Back to Home</a>
    </div>
@endsection
