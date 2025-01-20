@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Issue Book</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('issued-books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Select User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">-- Select User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="book_id" class="form-label">Select Book</label>
            <select name="book_id" id="book_id" class="form-control" required>
                <option value="">-- Select Book --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="issue_date" class="form-label">Issue Date</label>
            <input type="date" name="issue_date" id="issue_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input type="date" name="return_date" id="return_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Issue Book</button>
        <a href="{{ route('issued-books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
