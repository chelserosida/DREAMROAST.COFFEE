@extends('layouts.admin')

@section('content')
    <h2>Tambah Menu</h2>
    <form method="POST" action="/admin/menus" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label>Name</label><input class="form-control" name="name" required></div>
        <div class="mb-3"><label>Category</label>
            <select name="category_id" class="form-select">
                <option value="">-- Pilih --</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Price</label><input class="form-control" name="price"></div>
        <div class="mb-3"><label>Description</label><textarea class="form-control" name="description" rows="3"></textarea></div>
        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" class="form-control" name="image" accept="image/*">
            <small class="text-muted">Upload product image (JPG, PNG, max 2MB)</small>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
