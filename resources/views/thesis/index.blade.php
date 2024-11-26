@extends('layouts.app')

@section('content')
    <h1>List of Theses</h1>
    <a href="{{ route('theses.create') }}" class="btn btn-primary">Add New Thesis</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Access Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($theses as $thesis)
                <tr>
                    <td>{{ $thesis->title }}</td>
                    <td>{{ $thesis->author }}</td>
                    <td>{{ $thesis->year }}</td>
                    <td>{{ $thesis->access_type }}</td>
                    <td>
                        <a href="{{ route('theses.edit', $thesis->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('theses.destroy', $thesis->id) }}" method="POST" style="display:inline;">
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
