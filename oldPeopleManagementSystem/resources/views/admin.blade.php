<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 20px;">
<h2>Welcome to Admin Homepage</h2>
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
            <td><a href="logout">Logout</a></td>
        </tr>
    </tbody>
</table>
<a href="make_appointment" class="button-class">Schedule appointments for patients</a>
<a href="employees" class="button-class">View Employees</a>
<a href="payment" class="button-class">Manage Payments</a>
<a href="roster" class="button-class">View the roster</a>
<a href="create_roster" class="button-class">Create a Roster</a>
<a href="/admin/role" class="button-class">Role page</a>
<a href="approval"class="button-class">Approval page</a>
<a href="patients"class="button-class">Patients page</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>