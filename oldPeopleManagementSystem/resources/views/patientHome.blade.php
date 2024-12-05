<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Homepage</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray for subtle contrast */
        }
        .header-container {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 20px;
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #0056b3; /* Slightly darker blue */
            border: none;
        }
        .btn-primary:hover {
            background-color: #004085; /* Even darker blue on hover */
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        table thead {
            background-color: #343a40; /* Dark header */
            color: white;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2; /* Light gray for alternating rows */
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header-container text-center">
            <h1>Patient Homepage</h1>
        </div>
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <header class="text-center my-4">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
                Toggle Menu
            </button>
            <div class="collapse mt-3" id="adminHeader">
                @if(Session::get('role') == 'patient')
                    <div class="d-flex flex-wrap justify-content-center">
                        <a href="viewRoster" class="btn btn-outline-primary m-2">View the Roster</a>
                    </div>
                @endif
            </div>
        </header>

        <div class="card p-4 mb-4">
            
            <p class="text-center text-muted">Use the menu above to navigate the Patient panel.</p>
        </div>

        <div class="card p-4">
            <h2 class="text-center mb-4">Tasks Completed Today:</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Patient Id</th>
                        <th>Doctor's Name</th>
                        <th>Doctor's Appointment</th>
                        <th>Caregiver Name</th>
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
                            <td>{{ $detail->docs_name }}</td>
                            <td>{{ $detail->docs_appt }}</td>
                            <td>{{ $detail->caregiver_name }}</td>
                            <td>{{ $detail->morning_meds }}</td>
                            <td>{{ $detail->afternoon_meds }}</td>
                            <td>{{ $detail->night_meds }}</td>
                            <td>{{ $detail->breakfast }}</td>
                            <td>{{ $detail->lunch }}</td>
                            <td>{{ $detail->dinner }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No details available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
