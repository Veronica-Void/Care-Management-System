<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Page</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #f4f4f4; }
        .btn { padding: 5px 10px; color: white; text-decoration: none; border-radius: 5px; }
        .approve { background-color: #4CAF50; }
        .deny { background-color: #f44336; }
    </style>
</head>
<body>
    <h2>User Approval Page</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('fail'))
        <p style="color: red;">{{ session('fail') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unapprovedUsers as $user)
            <tr>
                <td>{{ $user->f_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('approveUser', ['id' => $user->id]) }}" class="btn approve">Approve</a>
                    <a href="{{ route('denyUser', ['id' => $user->id]) }}" class="btn deny">Deny</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
