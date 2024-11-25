<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
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
@if(Session::get('role') == 'admin')
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
            <div class="d-flex flex-wrap justify-content-center">
            <a href="/admin" class="bg-info header-link">Home</a>
                <a href="/make/appointment" class="bg-info header-link">Make Appointments</a>
                <a href="/payment" class="bg-info header-link">Manage Payments</a>
                <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                <a href="/newRoster" class="bg-info header-link">Create Roster</a>
                <a href="/admin/role" class="bg-info header-link">Role Page</a>
                <a href="/admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
            </div>
    </div>
    @endif
    @if(Session::get('role') == 'supervisor')
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
                <a href="admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
            </div>
        @endif
    </div>
</header>
<body>

<div class="container mt-3">
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
                        <th>Last Name</th>
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
                                <td>{{ $user->l_name }}</td>
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

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-secondary text-white">
            <h3>Search</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="id">Select search category</label>
                    <select name="searchTerm" id="searchTerm" class="form-control">
                        <option value="id">ID</option>
                        <option value="role">Role</option>
                        <option value="f_name">First Name</option>
                        <option value="l_name">Last Name</option>
                        <option value="email">Email Address</option>
                        <option value="phone">Phone Number</option>
                        <option value="dob">Date of Birth</option>
                        <option value="salary">Salary</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                        <label for="salary">Enter search term</label>
                        <input type="text" class="form-control" placeholder="Enter search term" name="searched" id="searched">
                    </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if($userRole == 'admin')
        <div class="card shadow-sm mb-4">
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
<a href="/logout">Logout</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
