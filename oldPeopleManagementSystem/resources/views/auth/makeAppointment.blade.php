<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointments</title>
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

    <!-- Page Content -->
    <div class="container mt-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h2>Make New Appointment</h2>
            </div>
            <div class="card-body">
                <!-- Patient Search Form -->
                <form action="{{ route('find_patient') }}" method="post">
                    @csrf
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    <div class="mb-3">
                        <label for="patient_id_search" class="form-label">Patient ID:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="patient_id_search" name="id" min="0">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <!-- Appointment Form -->
                <form action="{{ route('makeAppointment') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="patient_id" class="form-label">Current Patient ID:</label>
                        <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ $patient_id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="patient_name" class="form-label">Current Patient Name:</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name" value="{{ $patient }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date:</label>
                        <input type="date" class="form-control" name="dob" id="dob" value="{{old('dob')}}">
                        <span class="text-danger">@error('dob') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="doctor" class="form-label">Doctor:</label>
                        <select name="doctor" id="doctor" class="form-select">
                            @foreach ($doctors as $doctor)
                                <option>{{ $doctor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Ok</button>
                        <button type="button" class="btn btn-danger" onclick="location.reload()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
