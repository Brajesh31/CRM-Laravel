<?php $__env->startSection('content'); ?>
<h1>Register</h1>

<form action="<?php echo e(route('register.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div>
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>
    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="<?php echo e(route('login')); ?>">Login</a></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\mini-crm\resources\views/auth/register.blade.php ENDPATH**/ ?>