
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book List</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ ucfirst($book->status) }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No books available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
