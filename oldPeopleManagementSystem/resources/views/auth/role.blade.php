<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <header style="display: block; margin-top: 20px;">
        @if(Session::get('role') == 'admin')
            <a href="/admin" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1% 0.5% 0.1% 0.5%; margin-top: 1%; margin-left: 1%; text-decoration: none;">Home</a>
        @endif
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
    <div class="container mt-2">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
            <h2>Make new role</h2>
            </div>
            <div style="margin-left: 10px; margin-top: 10px;">
                <form action="{{route('admin-role')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <p end="">Role Access Level</p>
                    @foreach ($roles as $role)
                        <h3>{{ $role->role }}: {{ $role->access_lvl }}</h3>
                    @endforeach
                </div>
                <div class="form-group">
                    <p>New Role: <input name="role" type="text"></p>
                </div>
                <div class="form-group">
                    <p>Access Level: <input name="access_num" type="number" min=0></p>
                </div>
                    <button type="change_role" class="btn btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px;">Ok</button>
                </form>
                <a href="role"><button type="cancel" class="btn btn-primary" style="margin-left: 10px; margin-bottom: 10px;">Cancel</button></a>
            </div>
        </div>
    </div>
    <a href="logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>