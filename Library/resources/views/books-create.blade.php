<!DOCTYPE html>
<html>
<head>
    <title>Create Book</title>
</head>
<body>
    <h1>Create a Book</h1>

    <div class="container">
        <h1>Add a New Book</h1>
        <form method="POST" action="{{ route('createbook') }}">
            @csrf
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="published_date">Published Date</label>
                <input type="date" name="published_date" id="published_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>



</body>
</html>
