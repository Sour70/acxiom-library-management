@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Issued Books Report</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Book</th>
                <th>Issue Date</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($issuedBooks as $issuedBook)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $issuedBook->user->name }}</td>
                    <td>{{ $issuedBook->book->title }}</td>
                    <td>{{ $issuedBook->issue_date }}</td>
                    <td>{{ $issuedBook->return_date ?? 'Not Set' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No issued books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
