<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
</head>
<body>
    <h1>Update a Book</h1>

    <div class="container">
        <h1>Edit Book</h1>
        <form method="POST" action="{{ route('booksupdate', $book->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control" value="{{ $book->isbn }}" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="published_date">Published Date</label>
                <input type="date" name="published_date" id="published_date" class="form-control" value="{{ $book->published_date }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ $book->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $book->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>

</body>
</html>
