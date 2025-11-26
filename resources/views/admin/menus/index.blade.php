@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Menus</h2>
        <div>
            <a class="btn btn-secondary me-2" href="/admin/dashboard" style="background-color: var(--taupe); border: none; color: var(--black); font-weight: 600;">Back to Dashboard</a>
            <a class="btn btn-success" href="/admin/menus/create" style="background-color: #28a745; border: none; color: white; font-weight: 600;">Tambah Menu</a>
        </div>
    </div>
    <table class="table">
        <thead><tr><th>Name</th><th>Category</th><th>Price</th><th></th></tr></thead>
        <tbody>
        @foreach($menus as $m)
            <tr>
                <td>{{ $m->name }}</td>
                <td>{{ $m->category?->name }}</td>
                <td>{{ $m->price }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="/admin/menus/{{ $m->id }}/edit">Edit</a>
                    <form method="POST" action="/admin/menus/{{ $m->id }}" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
