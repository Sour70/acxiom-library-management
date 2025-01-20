@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Login</h1>
    <form method="POST" action="{{ route('authenticate') }}">
        @csrf
        <input type="hidden" name="role" value="admin">
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
