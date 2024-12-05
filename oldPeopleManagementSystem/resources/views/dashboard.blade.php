<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="container text-center my-4">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
        Toggle Menu
    </button>
    <div class="collapse mt-3" id="adminHeader">
        @if(Session::get('role') == 'supervisor')
            <div class="d-flex flex-wrap justify-content-center">
                <a href="/make/appointment" class="bg-info header-link">Make Appointments</a>
                <a href="employees" class="bg-info header-link">View Employees</a>
                <a href="viewRoster" class="bg-info header-link">View Roster</a>
                <a href="newRoster" class="bg-info header-link">Create Roster</a>
                <a href="/admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
                <a href="/adminReport" class="bg-info header-link">Missed Activities Report</a>
            </div>
        @endif
    </div>
</header>
<div class="container" style="margin-top: 20px;">
<h2>Welcome to Dashboard</h2>
<hr>
<table class="table">
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            <td>{{$data->f_name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->role}}</td>
            <td><a href="logout" class='btn btn-danger'>Logout</a></td>
        </tr>
    </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>