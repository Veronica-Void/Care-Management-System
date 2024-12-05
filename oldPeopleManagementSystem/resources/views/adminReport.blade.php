<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missed Activities Report</title>
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
<body>
<header class="container text-center my-4">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminMenu" aria-expanded="false" aria-controls="adminMenu">
        Toggle Menu
    </button>
    <div class="collapse mt-3" id="adminMenu">
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
                <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
            </div>
        @endif
    </div>
</header>
<div class="container mt-5">
    <h1 class="text-center">Missed Activities Report</h1>
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Patient Name</th>
                    <th>Patient ID</th>
                    <th>Caregiver ID</th>
                    <th>Missed Activities</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reportData as $data)
                    <tr>
                        <td>{{ $data['patient_name'] }}</td>
                        <td>{{ $data['patient_id'] }}</td>
                        <td>{{ $data['caregiver_id'] }}</td>
                        <td>{{ $data['missed_activities'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No missed activities found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
