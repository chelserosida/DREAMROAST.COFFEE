@extends('layouts.admin')

@section('content')
    <h2>Categories</h2>
    <a class="btn btn-success mb-3" href="/admin/categories/create">Add Category</a>
    <table class="table">
        <thead><tr><th>Name</th><th>Slug</th><th></th></tr></thead>
        <tbody>
        @foreach($cats as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->slug }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="/admin/categories/{{ $c->id }}/edit">Edit</a>
                    <form method="POST" action="/admin/categories/{{ $c->id }}" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
