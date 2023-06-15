<!-- Show details of a specific event -->
<h1>Event Details</h1>

<table class="table">
    <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $event->id }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $event->title }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $event->description }}</td>
        </tr>
        <tr>
            <th>Location</th>
            <td>{{ $event->location }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $event->date }}</td>
        </tr>
    </tbody>
</table>

<h2>Registered Attendees</h2>
@if ($event->attendees->count() > 0)
    <ul>
        @foreach ($event->attendees as $attendee)
            <li>{{ $attendee->user->name }} - {{ $attendee->user->email }}</li>
        @endforeach
    </ul>
@else
    <p>No attendees registered for this event.</p>
@endif

<a href="{{ route('events.index') }}" class="btn btn-primary">Back to List</a>

@auth
    <form action="{{ route('events.register', $event->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@else
    <p>You need to be logged in to register for this event.</p>
    <a href="{{ route('login') }}">Log in</a>
@endauth
