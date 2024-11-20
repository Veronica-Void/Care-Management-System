<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
<table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Phone#</th>
                <th>Date Of Birth</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $approvedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->role !== 'admin' && $user->role !== 'doctor'&& $user->role !== 'supervisor'&& $user->role !== 'family_member'&& $user->role !== 'caregiver'): ?>
                    <tr>
                    <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->f_name); ?></td>
                        <td><?php echo e($user->l_name); ?></td>
                        <td><?php echo e($user->role); ?></td>
                        <td><?php echo e($user->phone); ?></td>
                        <td><?php echo e($user->dob); ?></td>
                        <td><?php echo e($user->email); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <a href="logout">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\vlvoid221\Desktop\Care-Management-System\oldPeopleManagementSystem\resources\views/patients.blade.php ENDPATH**/ ?>