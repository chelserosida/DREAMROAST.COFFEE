@extends('layouts.admin')

@section('content')
    <h2>Upload Image</h2>
    <form method="POST" action="/admin/galleries" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label>Caption</label><input class="form-control" name="caption"></div>
        <div class="mb-3"><label>Image</label><input class="form-control" name="image" type="file" required></div>
        <button class="btn btn-primary">Upload</button>
    </form>
@endsection
