<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="login-container" style="margin-top: 20px;">
<h2>Login</h2>
<hr>
    <form action="<?php echo e(route('login-user')); ?>" method="post">
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>
        <?php if(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Enter Email">
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
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter Password" >
        <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
    </div>
        <button type="submit">Login</button>
    </form>
    <a href="register" class="button-class">Not a user? Register Here</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"></script>
</body>
</html><?php /**PATH C:\Users\epfri\OneDrive\Desktop\oldPersonManagementSystem\oldPeopleManagementSystem\resources\views/auth/login.blade.php ENDPATH**/ ?>