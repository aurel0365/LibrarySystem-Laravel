@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ $book->year }}" required>
        </div>
        <div class="form-group">
            <label for="access_type">Access Type</label>
            <select class="form-control" id="access_type" name="access_type" required>
                <option value="available" {{ $book->access_type == 'available' ? 'selected' : '' }}>Available</option>
                <option value="restricted" {{ $book->access_type == 'restricted' ? 'selected' : '' }}>Restricted</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
@endsection
