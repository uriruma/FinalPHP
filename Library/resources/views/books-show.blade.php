<!DOCTYPE html>
<html>
<head>
    <title>Books List</title>
</head>
<body>
    <h1>Books List</h1>

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
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($books as $book) --}}
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->published_date }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->price . " €"}}</td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</body>
</html>
