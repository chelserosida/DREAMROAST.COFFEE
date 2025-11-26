@extends('layouts.admin')

@section('content')
    <h2>Admin Dashboard</h2>
    <div class="row">
        <div class="col-md-4"><div class="card p-3">Menus: {{ $menusCount }}</div></div>
        <div class="col-md-4"><div class="card p-3">Beans: {{ $beansCount }}</div></div>
        <div class="col-md-4"><div class="card p-3">Messages: {{ $messagesCount }}</div></div>
    </div>
@endsection
