@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Beans</h2>
        <div>
            <a class="btn btn-secondary me-2" href="/admin/dashboard" style="background-color: var(--taupe); border: none; color: var(--black); font-weight: 600;">Back to Dashboard</a>
            <a class="btn btn-success" href="/admin/beans/create" style="background-color: #28a745; border: none; color: white; font-weight: 600;">Tambah Bean</a>
        </div>
    </div>
    <table class="table">
        <thead><tr><th>Name</th><th>Type</th><th>Price</th><th></th></tr></thead>
        <tbody>
        @foreach($beans as $b)
            <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->type }}</td>
                <td>{{ $b->price_per }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="/admin/beans/{{ $b->id }}/edit">Edit</a>
                    <form method="POST" action="/admin/beans/{{ $b->id }}" style="display:inline-block">
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
