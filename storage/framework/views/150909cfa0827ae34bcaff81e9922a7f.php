<?php $__env->startSection('content'); ?>
<h2>Add New Client</h2>
<form action="<?php echo e(route('clients.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">
    </div>
    <button type="submit">Add Client</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\mini-crm\resources\views/clients/create.blade.php ENDPATH**/ ?>