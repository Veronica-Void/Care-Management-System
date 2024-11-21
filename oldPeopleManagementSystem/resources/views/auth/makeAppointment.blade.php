<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <header style="display: block; margin-top: 20px;">
        @if(Session::get('role') == 'admin')
            <a href="/admin" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1% 0.5% 0.1% 0.5%; margin-top: 1%; margin-left: 1%; text-decoration: none;">Home</a>
        @endif
        <a href="/employees" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">View Employees</a>
        <a href="/payment" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Manage Payments</a>
        <a href="/roster" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">View the roster</a>
        <a href="/create_roster" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Create a Roster</a>
        <a href="/admin/role" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Role page</a>
        <a href="/approval" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Approval page</a>
        <a href="/patients" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Patients page</a>
        <a href="/additionalPatientInfo" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Patient Info</a>
    </header>
<body>
    <div class="container mt-2">
        <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h2>Make new appointment</h2>
        </div>
        <form action="{{ route('find_patient') }}" class="container mt" style="margin-top: 3%;" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-group">
                <p>Patient ID: <input type="number" name="id" min=0 ><button type="submit" class="btn btn-primary success-bg-subtle" style="margin-left: 10px;">Search</button></p>
            </div>
        </form>
        <div class="container mt" style="margin-bottom: 3%;">
            <form action="{{ route('makeAppointment') }}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <p>Current Patient ID:</p><input id="patient_id" name="patient_id" value="{{ $patient_id }}" readonly>
                    <p>Current Patient Name:</p><input id="patient_name" name="patient_name" value="{{ $patient }}" readonly>
                </div>
                <div class="form-group">
                    <label for="dob">Date:</label>
                    <input type="date" class="form-control" name="dob" id="dob" value="{{old('dob')}}">
                    <span class="text-danger">@error('dob') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="doctor">Doctor:</label>
                    <select name="doctor" id="doctor" class="form-control">
                        @foreach ($doctors as $doctor)
                            <option>{{ $doctor }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="change_role" class="btn btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px; margin-top: 3%;">Ok</button>
            </form>
            <a href="role"><button type="cancel" class="btn btn-primary" style="margin-left: 10px; margin-bottom: 10px;">Cancel</button></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <a href="/logout">Logout</a>
</body>
</html>