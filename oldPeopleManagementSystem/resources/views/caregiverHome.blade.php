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