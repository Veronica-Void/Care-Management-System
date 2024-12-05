<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Member Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: white; }
        .header-container { background-color: #007bff; color: white; padding: 20px; border-radius: 10px; }
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
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
            Toggle Menu
        </button>
        <div class="collapse mt-3" id="adminHeader" role="region" aria-label="Admin Menu">
            @if(Session::get('role') === 'family_member')
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="/viewRoster" class="header-link">View Roster</a>
                </div>
            @else
                <p class="text-danger">You do not have access to this menu.</p>
            @endif
        </div>
    </header>

    <div class="container mt-5">
        <div class="header-container text-center">
            <h1>Family Member Homepage</h1>
        </div>

        <div class="card p-4 my-4">
            <h2 class="text-center mb-4">Search for Family Member</h2>
            <form method="GET" action="{{ route('familyHome') }}">
                <div class="mb-3">
                    <label for="family_code" class="form-label">Enter Family Code</label>
                    <input type="text" class="form-control" id="family_code" name="family_code" required>
                </div>
                <div class="mb-3">
                    <label for="patient_id" class="form-label">Enter Patient ID</label>
                    <input type="text" class="form-control" id="patient_id" name="patient_id" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Enter Date of Appointment</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        @if(isset($details))
            <div class="card p-4">
                <h2 class="text-center mb-4">Patient Information</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient ID</th>
                            <th>Doctor's ID</th>
                            <th>Doctor's Appointment</th>
                            <th>Caregiver ID</th>
                            <th>Morning Meds</th>
                            <th>Afternoon Meds</th>
                            <th>Night Meds</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $detail)
                            <tr>
                                <td>{{ $detail->patient_name }}</td>
                                <td>{{ $detail->patient_id }}</td>
                                <td>{{ $detail->docs_id }}</td>
                                <td>{{ $detail->docs_appt }}</td>
                                <td>{{ $detail->caregiver_id }}</td>
                                <td>{{ $detail->morning_meds }}</td>
                                <td>{{ $detail->afternoon_meds }}</td>
                                <td>{{ $detail->night_meds }}</td>
                                <td>{{ $detail->breakfast }}</td>
                                <td>{{ $detail->lunch }}</td>
                                <td>{{ $detail->dinner }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">No details found for this family code or patient ID.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div> 

    <footer class="container text-center mt-5">
        <a href="/logout" class="btn btn-danger">Logout</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
