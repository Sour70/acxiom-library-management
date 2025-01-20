@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <h2>Welcome to the User Dashboard</h2>
    <ul>
        <li><a href="/user/books">Browse Books</a></li>
        <li><a href="/user/issued">View Issued Books</a></li>
        <li><a href="/user/fines">Pay Fines</a></li>
    </ul>
@endsection