<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-link {
            margin: 5px;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            border: solid 1px black;
            text-decoration: none;
            text-align: center;
        }
        .header-link:hover {
            background-color: #0056b3;
            color: white !important;
        }
    </style>
</head>
    <header class="container text-center my-4">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
        Toggle Menu
    </button>
    <div class="collapse mt-3" id="adminHeader">
        @if(Session::get('role') == 'admin')
            <div class="d-flex flex-wrap justify-content-center">
            <a href="/admin" class="bg-info header-link">Home</a>
                <a href="/make/appointment" class="bg-info header-link">Make Appointments</a>
                <a href="/employees" class="bg-info header-link">View Employees</a>
                <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                <a href="/payment" class="bg-info header-link">Payments</a>
                <a href="/admin/role" class="bg-info header-link">Role Page</a>
                <a href="/newRoster" class="bg-info header-link">Create Roster</a>
                <a href="/patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
            </div>
        @endif
    </div>
</header>
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
    <a href="/logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
