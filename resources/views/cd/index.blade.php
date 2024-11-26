@extends('layouts.app')

@section('content')
    <h1>List of CDs</h1>
    <a href="{{ route('cds.create') }}" class="btn btn-primary">Add New CD</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Access Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cds as $cd)
                <tr>
                    <td>{{ $cd->title }}</td>
                    <td>{{ $cd->artist }}</td>
                    <td>{{ $cd->year }}</td>
                    <td>{{ $cd->access_type }}</td>
                    <td>
                        <a href="{{ route('cds.edit', $cd->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cds.destroy', $cd->id) }}" method="POST" style="display:inline;">
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
