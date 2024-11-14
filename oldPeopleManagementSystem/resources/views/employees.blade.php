<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
                @if($user->role !== 'patient' && $user->role !== 'family member')
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

    @if($userRole == 'admin')
        <form action="post">
            <h2>Admin Form</h2>
            <div class="form-group">
            <label for="id">Enter Employee Id to change salary</label>
            <input type="text" class="form-control" placeholder="Enter employee ID" name="id" id="id" value="{{ old('id') }}">
            <span class="text-danger">@error('id') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="salary">Enter Salary</label>
            <input type="text" class="form-control" placeholder="Enter Employee salary" name="salary" id="salary" value="{{ old('salary') }}">
            <span class="text-danger">@error('salary') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
