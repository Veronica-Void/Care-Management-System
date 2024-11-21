<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="register-container" style="margin-top: 20px;">
    <h1>Registration</h1>
    <hr>
    <form action="<?php echo e(route('register-user')); ?>" method="post">
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>
        <?php if(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="roles">Role:</label>
            <select name="roles" id="roles" class="form-control" onchange="this.form.submit()">
                <option value="supervisor" <?php echo e(old('roles') == 'supervisor' ? 'selected' : ''); ?>>Supervisor</option>
                <option value="doctor" <?php echo e(old('roles') == 'doctor' ? 'selected' : ''); ?>>Doctor</option>
                <option value="caregiver" <?php echo e(old('roles') == 'caregiver' ? 'selected' : ''); ?>>Caregiver</option>
                <option value="patient" <?php echo e(old('roles') == 'patient' ? 'selected' : ''); ?>>Patient</option>
                <option value="family_member" <?php echo e(old('roles') == 'family_member' ? 'selected' : ''); ?>>Family Member</option>
            </select>
        </div>

        <!-- Always visible fields -->
        <div class="form-group">
            <label for="f_name">First Name:</label>
            <input type="text" class="form-control" placeholder="Enter First Name" name="f_name" id="f_name" value="<?php echo e(old('f_name')); ?>">
            <span class="text-danger"><?php $__errorArgs = ['f_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>

        <div class="form-group">
            <label for="l_name">Last Name:</label>
            <input type="text" class="form-control" placeholder="Enter Last Name" name="l_name" id="l_name" value="<?php echo e(old('l_name')); ?>">
            <span class="text-danger"><?php $__errorArgs = ['l_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" value="<?php echo e(old('email')); ?>">
            <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" id="phone" value="<?php echo e(old('phone')); ?>">
            <span class="text-danger"><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
            <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" name="dob" id="dob" value="<?php echo e(old('dob')); ?>">
            <span class="text-danger"><?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>

        <!-- Display Patient-specific Fields if Role is 'Patient' -->
        <?php if($showPatientFields): ?>
            <div class="form-group">
                <label for="family_code">Family Code:</label>
                <input type="text" class="form-control" name="family_code" id="family_code" value="<?php echo e(old('family_code')); ?>">
                <span class="text-danger"><?php $__errorArgs = ['family_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
            <div class="form-group">
                <label for="emergency_contact">Emergency Contact:</label>
                <input type="text" class="form-control" name="emergency_contact" id="emergency_contact" value="<?php echo e(old('emergency_contact')); ?>">
                <span class="text-danger"><?php $__errorArgs = ['emergency_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
            <div class="form-group">
                <label for="relation_to_emergency_contact">Relation to Emergency Contact:</label>
                <input type="text" class="form-control" name="relation_to_emergency_contact" id="relation_to_emergency_contact" value="<?php echo e(old('relation_to_emergency_contact')); ?>">
                <span class="text-danger"><?php $__errorArgs = ['relation_to_emergency_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
    <a href="login" class="btn btn-link">Already a user? Login Here</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\epfri\OneDrive\Desktop\oldPersonManagementSystem\oldPeopleManagementSystem\resources\views/auth/register.blade.php ENDPATH**/ ?>