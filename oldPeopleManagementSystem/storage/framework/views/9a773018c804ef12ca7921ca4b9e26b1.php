<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

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
            <td><?php echo e($data->f_name); ?></td>
            <td><?php echo e($data->email); ?></td>
            <td><?php echo e($data->role); ?></td>
            <td><a href="logout">Logout</a></td>
        </tr>
    </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\epfri\OneDrive\Desktop\oldPersonManagementSystem\oldPeopleManagementSystem\resources\views/dashboard.blade.php ENDPATH**/ ?>