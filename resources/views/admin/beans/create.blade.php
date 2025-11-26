@extends('layouts.admin')

@section('content')
    <h2>Tambah Bean</h2>
    <form method="POST" action="/admin/beans">
        @csrf
        <div class="mb-3"><label>Name</label><input class="form-control" name="name" required></div>
        <div class="mb-3"><label>Type</label><input class="form-control" name="type"></div>
        <div class="mb-3"><label>Price per</label><input class="form-control" name="price_per"></div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
