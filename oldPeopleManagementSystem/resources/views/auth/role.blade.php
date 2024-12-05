<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Page</title>
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
<header class="container text-center my-4">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
        Toggle Menu
    </button>
    <div class="collapse mt-3" id="adminHeader">
        @if(Session::get('role') == 'admin')
            <div class="d-flex flex-wrap justify-content-center">
            <a href="/admin" class="bg-info header-link">Home</a>
                <a href="/make/appointment" class="bg-info header-link">Make Appointments</a>
                <a href="/employees" class="bg-info header-link">View Employees</a>
                <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                <a href="/newRoster" class="bg-info header-link">Create Roster</a>
                <a href="/payment" class="bg-info header-link">Payment Page</a>
                <a href="/admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="/patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
                <a href="/adminReport" class="bg-info header-link">Missed Activities Report</a>
            </div>
        @endif
    </div>
</header>
<body>
    <div class="container mt-2">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
            <h2>Make new role</h2>
            </div>
            <div style="margin-left: 10px; margin-top: 10px;">
                <form action="{{route('admin-role')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <p end="">Role Access Level</p>
                    @foreach ($roles as $role)
                        <h3 class="text-center">{{ $role->role }}: {{ $role->access_lvl }}</h3>
                    @endforeach
                </div>
                <div class="form-group">
                    <p>New Role: <input name="role" type="text"></p>
                </div>
                <div class="form-group">
                    <p>Access Level: <input name="access_num" type="number" min=0></p>
                </div>
                    <button type="change_role" class="btn btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px;">Ok</button>
                </form>
                <a href="role"><button type="cancel" class="btn btn-primary" style="margin-left: 10px; margin-bottom: 10px;">Cancel</button></a>
            </div>
        </div>
    </div>
    <a href="/logout" class='btn btn-danger'>Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>