@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Issued Books</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        {{-- <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Book</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($issuedBooks as $issuedBook)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $issuedBook->user->name }}</td>
                    <td>{{ $issuedBook->book->title }}</td>
                    <td>{{ $issuedBook->issue_date }}</td>
                    <td>{{ $issuedBook->return_date ?? 'N/A' }}</td>
                    <td>{{ ucfirst($issuedBook->status) }}</td>
                    <td>
                        @if($issuedBook->status === 'issued')
                            <form action="{{ route('issued-books.update', $issuedBook) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Mark as Returned</button>
                            </form>
                        @else
                            Returned
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No issued books found.</td>
                </tr>
            @endforelse
        </tbody> --}}


        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Book</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Fine</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($issuedBooks as $issuedBook)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $issuedBook->user->name }}</td>
                    <td>{{ $issuedBook->book->title }}</td>
                    <td>{{ $issuedBook->issue_date }}</td>
                    <td>{{ $issuedBook->return_date ?? 'N/A' }}</td>
                    <td>{{ ucfirst($issuedBook->status) }}</td>
                    <td>{{ $issuedBook->fine ? number_format($issuedBook->fine, 2) : '0.00' }}</td>
                    <td>
                        @if($issuedBook->status === 'issued')
                            <form action="{{ route('issued-books.update', $issuedBook) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Mark as Returned</button>
                            </form>
                        @else
                            Returned
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No issued books found.</td>
                </tr>
            @endforelse
        </tbody>
        
    </table>
</div>
@endsection
