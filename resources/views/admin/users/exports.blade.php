<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <Th>Role</Th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            @if ($user->role_id == '1')
              <td>Admin</td>
            @elseif($user->role_id == '2')
              <td>Moderator</td>  
            @else
              <td>user</td> 
            @endif
        </tr>
    @endforeach
    </tbody>
</table>