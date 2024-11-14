<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Phone#</th>
                <th>Date Of Birth</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($approvedUsers as $user)
                @if($user->role !== 'admin' && $user->role !== 'doctor'&& $user->role !== 'supervisor'&& $user->role !== 'family member'&& $user->role !== 'caregiver')
                    <tr>
                    <td>{{ $user->id }}</td>
                        <td>{{ $user->f_name }}</td>
                        <td>{{ $user->l_name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <a href="logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>