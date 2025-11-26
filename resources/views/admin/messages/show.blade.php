@extends('layouts.admin')

@section('content')
    <h2>Message from {{ $message->name }}</h2>
    <p><strong>Email:</strong> {{ $message->email }}</p>
    <p><strong>Subject:</strong> {{ $message->subject }}</p>
    <p>{{ $message->message }}</p>
    <a class="btn btn-secondary" href="/admin/messages">Back</a>
@endsection
