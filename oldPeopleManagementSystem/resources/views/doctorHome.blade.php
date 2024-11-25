<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Page</title>
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
        </div>
    </header>
    <h2>Doctor's Homepage</h2>
    <p>{{ $message }}</p>
    <form action="{{ route('getPatient') }}" method="post">
        @csrf
        <div class="container mt" style="margin-bottom: 3%;">
            <label for="patient">Patient:</label>
            <select name="patient" id="patient" class="form-control" style="max-width: 25%;">
                @if ($patients != "N/A")
                    @foreach ($patients as $patient)
                        <option>{{ $patient }}</option>
                    @endforeach
                    
                    @else
                        <option>N/A</option>
                    @endelse
                @endif
            </select>
            <button type="submit" class="btn btn-primary success-bg-subtle">Search</button>
        </div>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('fail'))
        <p style="color: red;">{{ session('fail') }}</p>
    @endif

    <form action="{{ route('check') }}" method="post">
        @csrf
        <div class="card shadow-sm mb-4">
            <div class="container-sm card-header bg-primary text-white">
                <h3>Checklist</h3>
            </div>
            <div class="container-sm card-header bg-secondary text-white" style="display: table; padding: 10px;">
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <!-- <p style="background-color: green; border-type: solid; border-radius: 10px;">Complete</p> -->
                    <input type="checkbox" id="morning_med" value=1>
                    <label for="morning_med">Morning Medicine</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="afternoon_med" value=1>
                    <label for="afternoon_med">Afternoon Medicine</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="night_med" value=1>
                    <label for="night_med">Night Medicine</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="breakfast" value=1>
                    <label for="breakfast">Breakfast</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="lunch" value=1>
                    <label for="lunch">Lunch</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="dinner" value=1>
                    <label for="dinner">Dinner</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn approve btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px; margin-top: 3%;">Confirm</button>
    </form>
    <a href="" class="btn approve btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px; margin-top: 3%;">Clear</a>
    <a href="/logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
