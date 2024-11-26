@extends('layouts.app')

@section('content')
    <h1>Edit CD</h1>
    <form action="{{ route('cds.update', $cd->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $cd->title }}" required>
        </div>
        <div class="form-group">
            <label for="artist">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist" value="{{ $cd->artist }}" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ $cd->year }}" required>
        </div>
        <div class="form-group">
            <label for="access_type">Access Type</label>
            <select class="form-control" id="access_type" name="access_type" required>
                <option value="available" {{ $cd->access_type == 'available' ? 'selected' : '' }}>Available</option>
                <option value="restricted" {{ $cd->access_type == 'restricted' ? 'selected' : '' }}>Restricted</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update CD</button>
    </form>
@endsection
