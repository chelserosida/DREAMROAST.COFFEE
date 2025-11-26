@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gallery Images</h2>
        <div>
            <a class="btn btn-secondary me-2" href="/admin/dashboard" style="background-color: var(--taupe); border: none; color: var(--black); font-weight: 600;">Back to Dashboard</a>
            <a class="btn btn-success" href="/admin/galleries/create" style="background-color: #28a745; border: none; color: white; font-weight: 600;">Upload Image</a>
        </div>
    </div>
    <div class="row">
        @foreach($images as $img)
            <div class="col-md-3 mb-3">
                <img src="/images/{{ $img->filename }}" class="img-fluid rounded">
                <form method="POST" action="/admin/galleries/{{ $img->id }}" style="margin-top:6px">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
