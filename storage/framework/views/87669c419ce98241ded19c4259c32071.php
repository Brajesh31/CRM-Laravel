<?php $__env->startSection('content'); ?>
<h2>Edit Client</h2>
<form action="<?php echo e(route('clients.update', $client)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo e($client->name); ?>" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo e($client->email); ?>" required>
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo e($client->phone); ?>">
    </div>
    <button type="submit">Update Client</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\mini-crm\resources\views/clients/edit.blade.php ENDPATH**/ ?>