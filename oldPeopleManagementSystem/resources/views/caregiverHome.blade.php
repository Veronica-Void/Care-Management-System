<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caregiver Homepage</title>
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
    <h1>Caregiver Homepage</h1>
        <!-- made a card to welcome the user -->
    <div class="col-md-8 mx-auto">
        <div class="card p-4 mb-4">
            <h2>Welcome, {{ $care_first }}!</h2>
            <p class="text-center text-muted">Use the dropdown to select a patient and get started!</p>
        </div>
    </div>
                <!-- displaying the patient you are currently editing with a success message -->
    <div class="card shadow-sm mb-4">
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
                }, 5000); // 5000 milliseconds = 5 seconds
            </script>
        @endif    
    </div>

    <form action="{{ route('selectPatient') }}" method="post">
        @csrf
        <div class="container mt" style="margin-bottom: 3%;">
        <!-- displaying the patient's first and last names in the dropdown menu -->
            Patient:
            <select name="patient_name" id="patient_name" class="form-control" style="max-width: 25%;">
                @if ($patients != "N/A")
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->patient_name }}">{{ $patient->patient_name }}</option>
                    @endforeach 
                    @else
                        <option>N/A</option>
                    @endif
            </select>
            <button type="submit" class="btn btn-primary success-bg-subtle btn-lg">Select Patient</button>
        </div>
    </form>

    <!-- display the patient's information once a patient has been selected -->
    @if(session::has('selected_patient'))
        <form action="{{ route('storePatientInfo') }}" method="post">
            @csrf
            <div class="container-sm card-header bg-none text-black" style="display: table; padding: 10px;">
                <h3 >Selected Patient: {{ session('selected_patient') }}</h3>
                <!-- displaying the patient name as a hidden input so I can grab the value and put in DB -->
                <input type="hidden" name="patient_name" value="{{ session('selected_patient') }}" required>
                <input type="hidden" name="patient_id" value="{{ session('patient_id') }}">
                <input type="hidden" name="docs_name" value="{{ session('docs_name') }}">
                <input type="hidden" name="docs_appt" value="{{ session('docs_appt') }}">
                <input type="hidden" name="caregiver_first" value="{{ session('$care_first') }}">
                <input type="hidden" name="caregiver_last" value="{{ session('$care_last') }}">

                <!-- checklist for meds and meals -->
                <div>
                    <h5>Morning Medication</h5> <input type="checkbox" name="morning_med" value="1" class="form-check-input form-check-input-lg">
                </div> <br>

                <div>
                    <h5>Afternoon Medication</h5> <input type="checkbox" name="afternoon_med" value="1" class="form-check-input form-check-input-lg">
                </div> <br>

                <div>
                    <h5>Night Medication</h5> <input type="checkbox" name="night_med" value="1" class="form-check-input form-check-input-lg">
                </div> <br>

                <div>
                    <h5>Breakfast</h5> <input type="checkbox" name="breakfast" value="1" class="form-check-input form-check-input-lg"> 
                </div> <br>

                <div>
                    <h5>Lunch</h5> <input type="checkbox" name="lunch" value="1" class="form-check-input form-check-input-lg"> 
                </div> <br>

                <div>
                    <h5>Dinner</h5> <input type="checkbox" name="dinner" value="1" class="form-check-input form-check-input-lg"> 
                </div> <br>

                <!-- submit and reset buttons -->
                <button type="submit" name="action" class="btn btn-primary success-bg-subtle btn-lg">Submit</button>
                <button type="reset" name="action" class="btn btn-primary success-bg-subtle btn-lg">Reset</button>
            </div>
        </form>
    @endif
    <a href="/logout" class="btn btn-primary">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>