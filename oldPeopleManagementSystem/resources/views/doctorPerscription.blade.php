<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pescription Page</title>
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
    <!-- Custom Header -->
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
                    <a href="/make/appointment" class="bg-info header-link">Schedule Appointments</a>
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
            @if(Session::get('role') == 'doctor')
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="/doctor" class="bg-info header-link">Home</a>
                    <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                    <a href="/patients" class="bg-info header-link">Patients Page</a>
                </div>
            @endif
        </div>
    </header>
    <h2>Perscription Page</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('fail'))
        <p style="color: red;">{{ session('fail') }}</p>
    @endif
    <form action="{{ route('doctor') }}" method="get">
        @csrf
        <div class="card shadow-sm mb-4">
            <div class="container-sm card-header bg-primary text-white">
                <h3>Current Appointments</h3>
            </div>
            @foreach ($data as $m)
            <div class="container-sm card-header bg-secondary text-white" style="display: table; padding: 10px;">
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="name">Patient Name</label><p></p>
                    <button type="submit" class="btn btn-light">{{ $m->patient_name }}</button>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="date">Date of appointment</label><p></p>
                    <p class="btn btn-light">{{ $m->docs_appt }}</p>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="doctors_comments">Doctor Comment</label><p></p>
                    <p class="btn btn-light">{{ $comments[$loop->iteration - 1] }}</p>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="morning_med">Morning Medicine</label><p></p>
                    @if ($m->morning_meds == 0)
                        <p class="btn btn-danger">Not Required</p>
                    @elseif ($m->morning_meds == 1)
                        <p class="btn btn-success">Required</label>
                    @else
                        <p class="btn btn-dark">N/A</p>
                    @endif 
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="afternoon_med">Afternoon Medicine</label><p></p>
                    @if ($m->afternoon_meds == 0)
                        <p class="btn btn-danger">Not Required</p>
                    @elseif ($m->afternoon_meds == 1)
                        <p class="btn btn-success">Required</label>
                    @else
                        <p class="btn btn-dark">N/A</p>
                    @endif
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="night_med">Night Medicine</label><p></p>
                    @if ($m->night_meds == 0)
                        <p class="btn btn-danger">Not Required</p>
                    @elseif ($m->night_meds == 1)
                        <p class="btn btn-success">Required</label>
                    @else
                        <p class="btn btn-dark">N/A</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </form>
    <form action="{{ route('newPerscription') }}" method="post">
        @csrf
        <div class="card shadow-sm mb-4">
            <div class="container-sm card-header bg-primary text-white">
                <h3>New Perscription</h3>
            </div>
            <div class="container-sm card-header bg-secondary text-white" style="display: table; padding: 10px;">
                <input type="hidden" class="form-control" name="patient_name" id="patient_name" value="{{ $patient_name }}" style="max-width: 80%; margin-left: 10%;">
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="doctors_comments">Doctor Comment</label><p></p>
                    <input class="form-control" name="comment" id="comment" placeholder="Please input a comment" style="max-width: 80%; margin-left: 10%;">
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="morning_med">Morning Medicine</label><p></p>
                    <input class="form-control" name="morning" id="morning" placeholder="[Yes or No]" style="max-width: 80%; margin-left: 10%;">
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="afternoon_med">Afternoon Medicine</label><p></p>
                    <input class="form-control" name="afternoon" id="afternoon" placeholder="[Yes or No]" style="max-width: 80%; margin-left: 10%;">
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="night_med">Night Medicine</label><p></p>
                    <input class="form-control" name="night" id="night" placeholder="[Yes or No]" style="max-width: 80%; margin-left: 10%;">
                </div>
            </div>
            <div class="container-sm card-header bg-primary-subtle text-white">
                <button type="submit" class="btn btn-success">Ok</button>
                <a href="/doctor" class="btn btn-success">Cancel</a>
            </div>
        </div>
    </form>
    <a href="/logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
