<!DOCTYPE html>
<html>
<head>
    <title>Books List</title>
</head>
<body>
    <h1>Books List</h1>

    <form action="{{ route('books.search') }}" method="POST">
        @csrf
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" value="{{ $search ?? '' }}">

        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $categoryId ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Search</button>
    </form>

    <a href="{{ route('books.create') }}">Add Book</a>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Isbn</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Date</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->published_date }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->price . " €"}}</td>
                <td>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $books->links() }}
</body>
</html>
