@extends('layouts.app') <!-- Optional: if you have a layout file -->

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Book List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Stock</th>
                <th>Price ($)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->stock }}</td>
                <td>{{ $book->price }}</td>
                <td>
                <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">View</a>

                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No books found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
