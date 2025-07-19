<?php $__env->startSection('content'); ?>
<h2>Clients</h2>
<a href="<?php echo e(route('clients.create')); ?>">Add New Client</a>
<ul>
    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <?php echo e($loop->iteration); ?>.
            <a href="<?php echo e(route('clients.show', $client)); ?>"><?php echo e($client->name); ?></a>
            <a href="<?php echo e(route('clients.edit', $client)); ?>">Edit</a>
            <form action="<?php echo e(route('clients.destroy', $client)); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit">Delete</button>
            </form>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\mini-crm\resources\views/clients/index.blade.php ENDPATH**/ ?>