<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <h1>Welcome to the additional patient info page!</h1>
    <form action="{{ route('additional-patient-info.store') }}" method="POST">
        @csrf
        <table>
            <thead>
                <th>Patient ID</th>
                <th>Group</th>
                <th>Admission Date</th>
                <th>Patient Name</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="patient_id" placeholder="Create 5-digit patient ID">
                    </td>

                    <td>
                        <input type="text" name="group" placeholder="Ex: A, B, C, D">
                    </td>

                    <td>
                        <input type="date" name="admission_date" placeholder="Select admission date">
                    </td>

                    

                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    

    <a href="logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>