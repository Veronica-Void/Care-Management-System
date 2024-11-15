<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH">
</head>
<body>
    <div class="role-container" style="margin-top: 20px;">
    <h2>Make new appointment</h2>
    <hr>
    <form action="{{ route('find_patient') }}" method="post">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <div class="form-group">
            <p>Patient ID: <input type="number" name="id" min=0><button type="submit">Search</button></p>
        </div>
    </form>
    <form action="{{ route('makeAppointment') }}" method="post">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <div class="form-group">
            <p>Current Patient ID:</p><p name="patient_id">{{ $patient_id }}</p>
            <p>Current Patient Name:</p><p name="patient_name">{{ $patient }}</p>
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
        <button>Ok</button>
    </form>
    <a href="appointment"><button type="cancel">Cancel</button></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"></script>
</body>
</html>