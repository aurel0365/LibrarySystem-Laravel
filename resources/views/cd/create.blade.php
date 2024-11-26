@extends('layouts.app')

@section('content')
    <h1>Add New CD</h1>
    <form action="{{ route('cds.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="artist">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist" required>
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
        <button type="submit" class="btn btn-primary">Add CD</button>
    </form>
@endsection
