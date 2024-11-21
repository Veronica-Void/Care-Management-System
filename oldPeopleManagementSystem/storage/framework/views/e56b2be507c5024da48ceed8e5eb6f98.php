<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Patient Info</title>
</head>
    <header style="display: block; margin-top: 20px;">
        <?php if(Session::get('role') == 'admin'): ?>
            <a href="/admin" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1% 0.5% 0.1% 0.5%; margin-top: 1%; margin-left: 1%; text-decoration: none;">Home</a>
        <?php endif; ?>
        <a href="make_appointment" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Schedule appointments for patients</a>
        <a href="employees" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">View Employees</a>
        <a href="payment" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Manage Payments</a>
        <a href="roster" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">View the roster</a>
        <a href="create_roster" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Create a Roster</a>
        <a href="/admin/role" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Role page</a>
        <a href="approval" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Approval page</a>
        <a href="patients" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Patients page</a>
        <a href="/additionalPatientInfo" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Patient Info</a>
        <a href="/make/appointment" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Make Appointment</a>
    </header>
<body>
    <h1>Welcome to the additional patient info page!</h1>
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
                    <input type="text" placeholder="Create 5-digit patient ID">
                </td>

                <td>
                    <input type="text" placeholder="Ex: A, B, C, D">
                </td>

                <td>
                    <input type="date" placeholder="Select admission date">
                </td>
                
                <td>
                    patient name here
                </td>

            </tr>
        </tbody>
    </table>
    <a href="logout">Logout</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\epfri\OneDrive\Desktop\oldPersonManagementSystem\oldPeopleManagementSystem\resources\views/additional-patient-info.blade.php ENDPATH**/ ?>