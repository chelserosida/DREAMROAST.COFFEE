@extends('layouts.admin')

@section('content')
    <h2>Edit Bean</h2>
    <form method="POST" action="/admin/beans/{{ $bean->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3"><label>Name</label><input class="form-control" name="name" value="{{ $bean->name }}" required></div>
        <div class="mb-3"><label>Type</label><input class="form-control" name="type" value="{{ $bean->type }}"></div>
        <div class="mb-3"><label>Price per</label><input class="form-control" name="price_per" value="{{ $bean->price_per }}"></div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
