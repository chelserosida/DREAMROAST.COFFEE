@extends('layouts.admin')

@section('content')
    <h2>Pesan Pengunjung</h2>
    <table class="table">
        <thead><tr><th>From</th><th>Subject</th><th>Date</th><th></th></tr></thead>
        <tbody>
        @foreach($messages as $m)
            <tr>
                <td>{{ $m->name }} &lt;{{ $m->email }}&gt;</td>
                <td>{{ $m->subject }}</td>
                <td>{{ $m->created_at->format('Y-m-d') }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="/admin/messages/{{ $m->id }}">View</a>
                    <form method="POST" action="/admin/messages/{{ $m->id }}" style="display:inline-block">
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
