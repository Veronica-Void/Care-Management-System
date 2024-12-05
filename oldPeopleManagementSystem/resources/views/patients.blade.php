<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients page</title>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="container text-center my-4">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
        Toggle Menu
    </button>
    <div class="collapse mt-3" id="adminHeader">
        @if(Session::get('role') == 'admin')
            <div class="d-flex flex-wrap justify-content-center">
                <a href="/make/appointment" class="bg-info header-link">Make Appointments</a>
                <a href="employees" class="bg-info header-link">View Employees</a>
                <a href="payment" class="bg-info header-link">Manage Payments</a>
                <a href="viewRoster" class="bg-info header-link">View Roster</a>
                <a href="newRoster" class="bg-info header-link">Create Roster</a>
                <a href="/admin/role" class="bg-info header-link">Role Page</a>
                <a href="admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
                <a href="/adminReport" class="bg-info header-link">Missed Activities Report</a>
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
                <a href="patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
            </div>
        @endif
    </div>
</header>
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
    <a href="/logout" class='btn btn-danger'>Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>