<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

<div class="login-container" style="margin-top: 20px;">
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
            <td><a href="logout">Logout</a></td>
        </tr>
    </tbody>
</table>
</div>
</body>
</html>