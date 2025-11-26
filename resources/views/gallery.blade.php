@extends('layouts.main')

@section('content')
    <h2>Gallery</h2>
    <div class="row">
        @foreach($gallery as $g)
            <div class="col-md-3 mb-3">
                <img src="/images/{{ $g->filename }}" class="img-fluid rounded">
            </div>
        @endforeach
    </div>
@endsection
