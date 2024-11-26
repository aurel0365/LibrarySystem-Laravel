@extends('layouts.app')

@section('content')
    <h1>Add New Newspaper</h1>
    <form action="{{ route('newspapers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="access_type">Access Type</label>
            <select class="form-control" id="access_type" name="access_type" required>
                <option value="available">Available</option>
                <option value="stored">Stored</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Newspaper</button>
    </form>
@endsection
