@extends('layouts.admin')

@section('content')
    <h2>Create Category</h2>
    <form method="POST" action="/admin/categories">
        @csrf
        <div class="mb-3"><label>Name</label><input class="form-control" name="name" required></div>
        <button class="btn btn-primary">Save</button>
    </form>
@endsection
