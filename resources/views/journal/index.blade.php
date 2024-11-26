@extends('layouts.app')

@section('content')
    <h1>List of Journals</h1>
    <a href="{{ route('journals.create') }}" class="btn btn-primary">Add New Journal</a>
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
            @foreach ($journals as $journal)
                <tr>
                    <td>{{ $journal->title }}</td>
                    <td>{{ $journal->author }}</td>
                    <td>{{ $journal->year }}</td>
                    <td>{{ $journal->access_type }}</td>
                    <td>
                        <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
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
