<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Roster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-link {
            margin: 5px;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            border: solid 1px black;
            text-decoration: none;
            text-align: center;
        }
        .header-link:hover {
            background-color: #0056b3;
            color: white !important;
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
                <a href="/make/appointment" class="bg-info header-link">Make Appointments</a>
                <a href="/employees" class="bg-info header-link">View Employees</a>
                <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                <a href="/payment" class="bg-info header-link">Payments</a>
                <a href="/admin/role" class="bg-info header-link">Role Page</a>
                <a href="/admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="/patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
                <a href="/adminReport" class="bg-info header-link">Missed Activities Report</a>
            </div>
        @endif
    </div>
</header>
    <div class="container mt-5">
        <h1>Create New Roster</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('roster.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="supervisor_name">Supervisor Name:</label>
                <select name="supervisor_name" id="supervisor_name" class="form-control" required>
                    <option value="" disabled selected>Select a Supervisor</option>
                    @foreach ($supervisors as $supervisor)
                        <option value="{{ $supervisor->f_name }}">{{ $supervisor->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="doctor_name">Doctor Name:</label>
                <select name="doctor_name" id="doctor_name" class="form-control" required>
                    <option value=""disabled selected>Select a Doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->f_name }}">{{ $doctor->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="caregiver_name">Caregiver Name:</label>
                <select name="caregiver_name" id="caregiver_name" class="form-control" required>
                    <option value=""disabled selected>Select a Caregiver</option>
                    @foreach ($caregivers as $caregiver)
                        <option value="{{ $caregiver->f_name }}">{{ $caregiver->f_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="group">Group:</label>
                <input type="group" name="group" id="group" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Roster</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <a href="/logout" class='btn btn-danger'>Logout</a>
</body>
</html>
