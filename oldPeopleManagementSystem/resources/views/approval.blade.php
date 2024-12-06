<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-link {
            margin: 0.5rem;
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            border: 1px solid #0d6efd;
            background-color: #0d6efd;
            text-align: center;
        }
        .header-link:hover {
            background-color: white;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <header class="container text-center my-4">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
            Toggle Menu
        </button>
        <div class="collapse mt-3" id="adminHeader">
            @if(Session::get('role') == 'admin')
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="/admin" class="header-link">Home</a>
                    <a href="/make/appointment" class="header-link">Make Appointments</a>
                    <a href="/employees" class="header-link">View Employees</a>
                    <a href="/viewRoster" class="header-link">View Roster</a>
                    <a href="/payment" class="header-link">Payments</a>
                    <a href="/admin/role" class="header-link">Role Page</a>
                    <a href="/newRoster" class="header-link">Create Roster</a>
                    <a href="/patients" class="header-link">Patients Page</a>
                    <a href="/additionalPatientInfo" class="header-link">Patient Info</a>
                    <a href="/adminReport" class="bg-info header-link">Missed Activities Report</a>
                </div>
            @endif
            @if(Session::get('role') == 'supervisor')
                <div class="d-flex flex-wrap justify-content-center">
                <a href="/dashboard" class="bg-info header-link">Home</a>
                    <a href="/make/appointment" class="bg-info header-link">Schedule Appointments</a>
                    <a href="/employees" class="bg-info header-link">View Employees</a>
                    <a href="/newRoster" class="bg-info header-link">Create Roster</a>
                    <a href="/admin/role" class="bg-info header-link">Role Page</a>
                    <a href="/patients" class="bg-info header-link">Patients Page</a>
                    <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
                    <a href="/adminReport" class="bg-info header-link">Missed Activities Report</a>
                </div>
                @endif
        </div>
    </header>

    <main class="container">
        <h2 class="text-center my-4">User Approval Page</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        @if(session('fail'))
            <div class="alert alert-danger text-center">
                {{ session('fail') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unapprovedUsers as $user)
                    <tr>
                        <td>{{ $user->f_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('approveUser', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Approve</a>
                            <a href="{{ route('denyUser', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Deny</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center my-3">
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
