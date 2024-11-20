<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <header style="display: block; margin-top: 20px;">
        <?php if(Session::get('role') == 'admin'): ?>
            <a href="/admin" class="bg-primary-subtle text-black" style="border-radius: 10px; border: solid; border-color: black; text-align: center; width: 10%; padding: 0.1% 0.5% 0.1% 0.5%; margin-top: 1%; margin-left: 1%; text-decoration: none;">Home</a>
        <?php endif; ?>
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

<div class="container mt-3">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('fail')): ?>
        <div class="alert alert-danger"><?php echo e(session('fail')); ?></div>
    <?php endif; ?>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3>Employee List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Phone#</th>
                        <th>Date Of Birth</th>
                        <th>Email</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $approvedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($user->role !== 'patient' && $user->role !== 'family_member'): ?>
                            <tr>
                            <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->f_name); ?></td>
                                <td><?php echo e($user->l_name); ?></td>
                                <td><?php echo e($user->role); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                                <td><?php echo e($user->dob); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->salary ?? 'N/A'); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-secondary text-white">
            <h3>Search</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('search')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <label for="id">Select search category</label>
                    <select name="searchTerm" id="searchTerm" class="form-control">
                        <option value="id">ID</option>
                        <option value="role">Role</option>
                        <option value="f_name">First Name</option>
                        <option value="l_name">Last Name</option>
                        <option value="email">Email Address</option>
                        <option value="phone">Phone Number</option>
                        <option value="dob">Date of Birth</option>
                        <option value="salary">Salary</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                        <label for="salary">Enter search term</label>
                        <input type="text" class="form-control" placeholder="Enter search term" name="searched" id="searched">
                    </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <?php if($userRole == 'admin'): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-secondary text-white">
                <h3>Admin Salary Update</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('update.salary')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="id">Enter Employee Id to change salary</label>
                        <input type="text" class="form-control" placeholder="Enter employee ID" name="id" id="id" value="<?php echo e(old('id')); ?>">
                        <span class="text-danger"><?php $__errorArgs = ['id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="salary">Enter Salary</label>
                        <input type="text" class="form-control" placeholder="Enter Employee salary" name="salary" id="salary" value="<?php echo e(old('salary')); ?>">
                        <span class="text-danger"><?php $__errorArgs = ['salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
<a href="logout">Logout</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\vlvoid221\Desktop\Care-Management-System\oldPeopleManagementSystem\resources\views/employees.blade.php ENDPATH**/ ?>