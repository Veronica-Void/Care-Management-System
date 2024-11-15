<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3>Employee List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Role</th>
                        <th>Phone#</th>
                        <th>Date Of Birth</th>
                        <th>Email</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvedUsers as $user)
                        @if($user->role !== 'patient' && $user->role !== 'family_member')
                            <tr>
                            <td>{{ $user->id }}</td>
                                <td>{{ $user->f_name }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->salary ?? 'N/A' }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if($userRole == 'admin')
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h3>Admin Salary Update</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update.salary') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id">Enter Employee Id to change salary</label>
                        <input type="text" class="form-control" placeholder="Enter employee ID" name="id" id="id" value="{{ old('id') }}">
                        <span class="text-danger">@error('id') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="salary">Enter Salary</label>
                        <input type="text" class="form-control" placeholder="Enter Employee salary" name="salary" id="salary" value="{{ old('salary') }}">
                        <span class="text-danger">@error('salary') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
<a href="logout">Logout</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
