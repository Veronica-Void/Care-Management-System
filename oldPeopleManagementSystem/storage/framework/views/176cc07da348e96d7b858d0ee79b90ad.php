<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Roster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header style="display: block; margin-top: 20px;">
        <a href="/make/appointment" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; margin-left: 1%; text-decoration: none;">Schedule appointments for patients</a>
        <a href="employees" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">View Employees</a>
        <a href="payment" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Manage Payments</a>
        <a href="viewRoster" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">View the roster</a>
        <a href="newRoster" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Create a Roster</a>
        <a href="/admin/role" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Role page</a>
        <a href="approval" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Approval page</a>
        <a href="patients" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Patients page</a>
        <a href="/additionalPatientInfo" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Patient Info</a>
        <a href="/make/appointment" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1%; margin-top: 1%; text-decoration: none;">Make Appointment</a>
    </header>
    <div class="container mt-5">
        <h1>Create New Roster</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('roster.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="supervisor_name">Supervisor Name:</label>
                <select name="supervisor_name" id="supervisor_name" class="form-control" required>
                    <option value="" disabled selected>Select a Supervisor</option>
                    <?php $__currentLoopData = $supervisors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supervisor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($supervisor->f_name); ?>"><?php echo e($supervisor->f_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="doctor_name">Doctor Name:</label>
                <select name="doctor_name" id="doctor_name" class="form-control" required>
                    <option value=""disabled selected>Select a Doctor</option>
                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($doctor->f_name); ?>"><?php echo e($doctor->f_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="caregiver_name">Caregiver Name:</label>
                <select name="caregiver_name" id="caregiver_name" class="form-control" required>
                    <option value=""disabled selected>Select a Caregiver</option>
                    <?php $__currentLoopData = $caregivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caregiver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($caregiver->f_name); ?>"><?php echo e($caregiver->f_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="group">Group:</label>
                <input type="group" name="group" id="group" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Roster</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\vlvoid221\Desktop\Care-Management-System\oldPeopleManagementSystem\resources\views/newRoster.blade.php ENDPATH**/ ?>