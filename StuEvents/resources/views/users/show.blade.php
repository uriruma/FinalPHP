<!-- Show details of a specific user -->

<h1>User Details</h1>

<table class="table">
    <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
    </tbody>
</table>

<a href="{{ route('users.index') }}" class="btn btn-primary">Back to List</a>
