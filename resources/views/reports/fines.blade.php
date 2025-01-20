@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fine Report</h1>
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
            @forelse($fines as $fine)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fine->user->name }}</td>
                    <td>{{ $fine->book->title }}</td>
                    <td>{{ $fine->issue_date }}</td>
                    <td>{{ $fine->return_date }}</td>
                    <td>{{ number_format($fine->fine, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No fines recorded.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
