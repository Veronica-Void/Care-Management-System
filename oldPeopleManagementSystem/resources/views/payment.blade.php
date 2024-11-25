<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make A Payment</title>
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
                <a href="/newRoster" class="bg-info header-link">Create Roster</a>
                <a href="/admin/role" class="bg-info header-link">Role Page</a>
                <a href="/admin/approval" class="bg-info header-link">Approval Page</a>
                <a href="/patients" class="bg-info header-link">Patients Page</a>
                <a href="/additionalPatientInfo" class="bg-info header-link">Patient Info</a>
            </div>
        @endif
    </div>
</header>
<body>
    <h1>You have reached the payment page!</h1>
    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <table>
            <thead>
                <th>Patient ID</th>
                <th>Total Due</th>
                <th>New Payment</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        patient ID goes here  
                    </td>
                    <td>
                        <p>&nbsp</p>total amount from payment page 
                    </td>
                    <td>
                        <input type="text" name="new_payment" placeholder="Add a new payment">
                    </td> 
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="/logout">Logout</a>

    <!-- Add the required scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
