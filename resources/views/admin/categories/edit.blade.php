@extends('layouts.admin')

@section('content')
    <h2>Edit Category</h2>
    <form method="POST" action="/admin/categories/{{ $category->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3"><label>Name</label><input class="form-control" name="name" value="{{ $category->name }}" required></div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
