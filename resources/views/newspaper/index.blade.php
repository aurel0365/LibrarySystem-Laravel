@extends('layouts.app')

@section('content')
    <h1>List of Newspapers</h1>
    <a href="{{ route('newspapers.create') }}" class="btn btn-primary">Add New Newspaper</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Publisher</th>
                <th>Date</th>
                <th>Access Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newspapers as $newspaper)
                <tr>
                    <td>{{ $newspaper->title }}</td>
                    <td>{{ $newspaper->publisher }}</td>
                    <td>{{ $newspaper->date }}</td>
                    <td>{{ $newspaper->access_type }}</td>
                    <td>
                        <a href="{{ route('newspapers.edit', $newspaper->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('newspapers.destroy', $newspaper->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
