@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Book</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn') }}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Add Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
