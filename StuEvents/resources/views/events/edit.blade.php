<!-- Form to edit event details -->
<h1>Edit Event</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required>{{ $event->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" value="{{ $event->date }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
