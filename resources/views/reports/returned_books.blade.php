@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Returned Books Report</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Book</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Fine</th>
            </tr>
        </thead>
        <tbody>
            @forelse($returnedBooks as $returnedBook)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $returnedBook->user->name }}</td>
                    <td>{{ $returnedBook->book->title }}</td>
                    <td>{{ $returnedBook->issue_date }}</td>
                    <td>{{ $returnedBook->return_date }}</td>
                    <td>{{ $returnedBook->fine ? number_format($returnedBook->fine, 2) : '0.00' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No returned books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
