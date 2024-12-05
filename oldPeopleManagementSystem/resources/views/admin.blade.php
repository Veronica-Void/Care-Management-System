<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar a {
            color: white !important;
        }
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
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
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

<!-- Header -->
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
                <a href="patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
                <a href="/adminReport" class="bg-info header-link">Missed Activities Report</a>
            </div>
        @endif
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card p-4 mb-4">
                <h2 class="text-center">Welcome, {{$data->f_name}}</h2>
                <p class="text-center text-muted">Use the menu above to navigate the admin panel.</p>
            </div>

            <div class="card p-4">
                <h4 class="mb-3">Your Details</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data->f_name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->role}}</td>
                            <td><a href="/logout" class="btn btn-danger btn-sm">Logout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
