<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caregiver Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h2>Caregiver Homepage</h2>
        <!-- giving a success message once a Patient has been selected successfully -->
        @if(Session::has('success'))
            <div id="successMsg" class="alert alert-success">{{ Session::get('success') }}</div>
            <script>
                // timer for the success message to disappear after a few seconds
                setTimeout(function() {
                    let message = document.getElementById('successMsg');
                    if (message) {
                        message.style.display = 'none';
                    }
                }, 2000); // 5000 milliseconds = 5 seconds
            </script>
        @endif
    <form action="{{ route('selectPatient') }}" method="post">
        @csrf
        <div class="container mt" style="margin-bottom: 3%;">
            <!-- displaying the patient's first and last names in the dropdown menu -->
            <label for="patient">Patient:</label>
            <select name="patient" id="patient" class="form-control" style="max-width: 25%;">
                @if ($patients != "N/A")
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->f_name }}">{{ $patient->f_name }} {{ $patient->l_name }}</option>
                    @endforeach
                    
                    @else
                        <option>N/A</option>
                @endif
            </select>
            <button type="submit" class="btn btn-primary success-bg-subtle">Select Patient</button>

        </div>
    </form>
                <!-- displaying the patient you are currently editing things for -->
    <div class="card shadow-sm mb-4">
        The patient You have selected is:
        @if (Session::has('selected_patient'))
            <div class="container mt">{{ Session::get('selected_patient') }}</div>
        @endif
    </div>

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
        <a href="" class="btn approve btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px; margin-top: 3%;">Confirm</a>
    </form>
    <a href="" class="btn approve btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px; margin-top: 3%;">Clear</a>
    <a href="/logout">Logout</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>