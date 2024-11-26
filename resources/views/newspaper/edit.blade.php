@extends('layouts.app')

@section('content')
    <h1>Edit Newspaper</h1>
    <form action="{{ route('newspapers.update', $newspaper->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $newspaper->title }}" required>
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $newspaper->publisher }}" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $newspaper->date }}" required>
        </div>
        <div class="form-group">
            <label for="access_type">Access Type</label>
            <select class="form-control" id="access_type" name="access_type" required>
                <option value="available" {{ $newspaper->access_type == 'available' ? 'selected' : '' }}>Available</option>
                <option value="stored" {{ $newspaper->access_type == 'stored' ? 'selected' : '' }}>Stored</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Newspaper</button>
    </form>
@endsection
