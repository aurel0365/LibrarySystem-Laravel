@extends('layouts.app')

@section('content')
    <h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="form-group">
            <label for="access_type">Access Type</label>
            <select class="form-control" id="access_type" name="access_type" required>
                <option value="available">Available</option>
                <option value="restricted">Restricted</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
@endsection
