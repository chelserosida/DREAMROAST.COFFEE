@extends('layouts.admin')

@section('content')
    <h2>Edit Menu</h2>
    <form method="POST" action="/admin/menus/{{ $menu->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3"><label>Name</label><input class="form-control" name="name" value="{{ $menu->name }}" required></div>
        <div class="mb-3"><label>Category</label>
            <select name="category_id" class="form-select">
                <option value="">-- Pilih --</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ $menu->category_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Price</label><input class="form-control" name="price" value="{{ $menu->price }}"></div>
        <div class="mb-3"><label>Description</label><textarea class="form-control" name="description" rows="3">{{ $menu->description }}</textarea></div>
        <div class="mb-3">
            <label>Product Image</label>
            @if($menu->image)
                <div class="mb-2">
                    <img src="/images/{{ $menu->image }}" alt="Current image" style="max-width: 200px; border-radius: 8px;">
                    <p class="text-muted small">Current: {{ $menu->image }}</p>
                </div>
            @endif
            <input type="file" class="form-control" name="image" accept="image/*">
            <small class="text-muted">Upload new image to replace current (JPG, PNG, max 2MB)</small>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
