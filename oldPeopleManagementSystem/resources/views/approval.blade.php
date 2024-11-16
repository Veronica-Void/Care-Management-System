<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
    <a href="admin"class="button-class">Admin page</a>    
    <a href="make_appointment" class="button-class">Schedule appointments for patients</a>
<a href="employees" class="button-class">View Employees</a>
<a href="payment" class="button-class">Manage Payments</a>
<a href="roster" class="button-class">View the roster</a>
<a href="create_roster" class="button-class">Create a Roster</a>
<a href="/admin/role" class="button-class">Role page</a>
<a href="patients"class="button-class">Patients page</a>
<a href="/additionalPatientInfo">Patient Info</a>
</header>
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
    <a href="logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
