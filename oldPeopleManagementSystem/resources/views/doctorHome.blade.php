<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Home Page</title>
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
<body>
    <header class="container text-center my-4">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adminHeader" aria-expanded="false" aria-controls="adminHeader">
            Toggle Menu
        </button>
            @if(Session::get('role') == 'doctor')
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="/viewRoster" class="bg-info header-link">View Roster</a>
                    <a href="/patients" class="bg-info header-link">Patients Page</a>
                </div>
            @endif
        </div>
    </header>
    <h2>Doctor's Homepage</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('fail'))
        <p style="color: red;">{{ session('fail') }}</p>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="container-sm card-header bg-primary text-white">
            <h3>Current Appointments</h3>
        </div>
            @if ($patients != "N/A")


                @foreach ($patients as $patient)
                    @if ($date[$loop->iteration - 1] == date("20y-m-d"))
                    <div class="container-sm card-header bg-secondary text-white" style="display: table; padding: 10px;">
                        <form action="{{ route('searchPatient') }}" method="post">
                            @csrf
                            <div style="vertical-align: top; display: table-cell; text-align: center;">
                                <label for="name">Patient Name</label><p></p>
                                <input type="hidden" id="patient_id" name="patient_id" value="{{ $patient_id[$loop->iteration - 1] }}"></input>
                                <button type="submit" class="btn btn-light">{{ $patient }}</button>
                            </div>
                            <div style="vertical-align: top; display: table-cell; text-align: center;">
                                <label for="date">Date of appointment</label><p></p>
                                <p class="btn btn-light">{{ $date[$loop->iteration - 1] }}</p>
                            </div>
                            <div style="vertical-align: top; display: table-cell; text-align: center;">
                                <label for="date">Comment</label><p></p>
                                <p class="btn btn-light">{{ $comment[$loop->iteration - 1] }}</p>
                            </div>
                            <div style="vertical-align: top; display: table-cell; text-align: center;">
                                <label for="morning_med">Morning Medicine</label><p></p>
                                @if ($data[0][$loop->iteration - 1] == 0)
                                    <p class="btn btn-danger">Not Required</p>
                                @elseif ($data[0][$loop->iteration - 1] == 1)
                                    <p class="btn btn-success">Required</label>
                                @else
                                    <p class="btn btn-dark">N/A</p>
                                @endif
                            </div>
                            <div style="vertical-align: top; display: table-cell; text-align: center;">
                                <label for="afternoon_med">Afternoon Medicine</label><p></p>
                                @if ($data[1][$loop->iteration - 1] == 0)
                                    <p class="btn btn-danger">Not Required</p>
                                @elseif ($data[1][$loop->iteration - 1] == 1)
                                    <p class="btn btn-success">Required</label>
                                @else
                                    <p class="btn btn-dark">N/A</p>
                                @endif
                            </div>
                            <div style="vertical-align: top; display: table-cell; text-align: center;">
                                <label for="night_med">Night Medicine</label><p></p>
                                @if ($data[2][$loop->iteration - 1] == 0)
                                    <p class="btn btn-danger">Not Required</p>
                                @elseif ($data[2][$loop->iteration - 1] == 1)
                                    <p class="btn btn-success">Required</label>
                                @else
                                    <p class="btn btn-dark">N/A</p>
                                @endif
                            </div>
                        </form>
                    </div>
                    @endif
                @endforeach
            @else
            <div class="container-sm card-header bg-secondary text-white" style="display: table; padding: 10px;">
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="name">Patient Name</label><p></p>
                    <button type="submit" class="btn btn-light">None</button>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="date">Date of appointment</label><p></p>
                    <p class="btn btn-light">None</p>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="date">Comment</label><p></p>
                    <p class="btn btn-light">None</p>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="morning_med">Morning Medicine</label><p></p>
                    <p class="btn btn-dark">None</p>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="afternoon_med">Afternoon Medicine</label><p></p>
                    <p class="btn btn-dark">None</p>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <label for="night_med">Night Medicine</label><p></p>
                    <p class="btn btn-dark">None</p>
                </div>
            </div>
            @endif
        </div>
    </div>
    <a href="/logout" class='btn btn-danger'>Logout</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>