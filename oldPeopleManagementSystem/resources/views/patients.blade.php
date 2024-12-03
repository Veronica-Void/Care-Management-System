<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-link {
            margin: 0.5rem;
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: black;
            border-radius: 5px;
            border: 1px solid #0d6efd;
            text-align: center;
        }
        .header-link:hover {
            background-color: #0d6efd;
            color: white;
        }
    </style>
</head>
<header class="container text-center my-4">
@if(Session::get('role') == 'doctor')
<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
        Toggle Menu
    </button>
    <div class="collapse mt-3" id="adminHeader">
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="/doctor" class="bg-info header-link">Home</a>
                    <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                </div>
            @endif
@if(Session::get('role') == 'admin')
<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
        Toggle Menu
    </button>
    <div class="collapse mt-3" id="adminHeader">
            <div class="d-flex flex-wrap justify-content-center">
            <a href="/admin" class="bg-info header-link">Home</a>
                <a href="/make/appointment" class="bg-info header-link">Make Appointments</a>
                <a href="employees" class="bg-info header-link">View Employees</a>
                <a href="payment" class="bg-info header-link">Manage Payments</a>
                <a href="viewRoster" class="bg-info header-link">View Roster</a>
                <a href="newRoster" class="bg-info header-link">Create Roster</a>
                <a href="/admin/role" class="bg-info header-link">Role Page</a>
                <a href="admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
            </div>
        @endif
    </div>
</header>
@if(Session::get('role') == 'supervisor')
<header class="container text-center my-4">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
        Toggle Menu
    </button>
    <div class="collapse mt-3" id="adminHeader">
            <div class="d-flex flex-wrap justify-content-center">
            <a href="/dashboard" class="bg-info header-link">Home</a>
                <a href="/make/appointment" class="bg-info header-link">Make Appointments</a>
                <a href="employees" class="bg-info header-link">View Employees</a>
                <a href="viewRoster" class="bg-info header-link">View Roster</a>
                <a href="newRoster" class="bg-info header-link">Create Roster</a>
                <a href="/admin/role" class="bg-info header-link">Role Page</a>
                <a href="admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
            </div>
        @endif
    </div>
</header>
<body>
<table class="table">
        <thead>
            <tr>
                <th>Patient Id</th>
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
                @if($user->role !== 'admin' && $user->role !== 'doctor'&& $user->role !== 'supervisor'&& $user->role !== 'family_member'&& $user->role !== 'caregiver')
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
    <a href="/logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>