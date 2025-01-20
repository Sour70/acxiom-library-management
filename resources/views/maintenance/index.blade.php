@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h2>Housekeeping</h2>
    <ul>
        <li><a href="/admin/books">Membership</a></li>
        <li><a href="/admin/users">Books</a></li>
        {{-- <li><a href="/admin/users">Movie</a></li> --}}
        <li><a href="/admin/users">User Management</a></li>
    </ul>
@endsection