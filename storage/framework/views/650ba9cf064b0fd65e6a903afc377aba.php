<?php $__env->startSection('content'); ?>
<h1>Login</h1>

<form action="<?php echo e(route('login.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="<?php echo e(route('register')); ?>">Register</a></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\mini-crm\resources\views/auth/login.blade.php ENDPATH**/ ?>