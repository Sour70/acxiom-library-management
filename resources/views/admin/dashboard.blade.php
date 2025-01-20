@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h2>Welcome to the Admin Dashboard</h2>
    <ul>
        <li><a href="/admin/books">Manage Books</a></li>
        <li><a href="/admin/users">Manage Users</a></li>
        <li><a href="/admin/reports">View Reports</a></li>
    </ul>
@endsection