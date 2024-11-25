<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Roster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
<body>
<header class="container text-center my-4">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
            Toggle Menu
        </button>
        <div class="collapse mt-3" id="adminHeader">
            @if(Session::get('role') == 'admin')
            <div class="d-flex flex-wrap justify-content-center">
                    <a href="/admin" class="bg-info header-link">Home</a>
                    <a href="/employees" class="bg-info header-link">View Employees</a>
                    <a href="/payment" class="bg-info header-link">Manage Payments</a>
                    <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                    <a href="/newRoster" class="bg-info header-link">Create Roster</a>
                    <a href="/admin/role" class="bg-info header-link">Role Page</a>
                    <a href="/admin/approval" class="bg-info header-link">Approval Page</a>
                    <a href="/patients" class="bg-info header-link">Patients Page</a>
                    <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
                </div>
            @endif
            @if(Session::get('role') == 'supervisor')
                <div class="d-flex flex-wrap justify-content-center">
                <a href="/dashboard" class="bg-info header-link">Home</a>
                    <a href="/make/appointment" class="bg-info header-link">Schedule Appointments</a>
                    <a href="/employees" class="bg-info header-link">View Employees</a>
                    <a href="/newRoster" class="bg-info header-link">Create Roster</a>
                    <a href="/admin/role" class="bg-info header-link">Role Page</a>
                    <a href="/admin/approval" class="bg-info header-link">Approval Page</a>
                    <a href="/patients" class="bg-info header-link">Patients Page</a>
                    <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
                </div>
                @endif
                @if(Session::get('role') == 'patient')
        <a href="/patientHome" class="bg-info header-link">Home</a>
        @endif
        </div>
    </header>

        
    </header>
    <div class="container mt-5">
        <h1>Roster List</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Supervisor Name</th>
                    <th>Doctor Name</th>
                    <th>Caregiver Name</th>
                    <th>Patient Group</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rosters as $roster)
                    <tr>
                        <td>{{ $roster->supervisor_name }}</td>
                        <td>{{ $roster->doctor_name }}</td>
                        <td>{{ $roster->caregiver_name }}</td>
                        <td>{{ $roster->group }}</td>
                        <td>{{ $roster->date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No rosters available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <a href="/logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
