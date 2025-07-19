<?php $__env->startSection('content'); ?>
<h1><?php echo e($client->name); ?></h1>
<p>Email: <?php echo e($client->email); ?></p>
<p>Phone: <?php echo e($client->phone); ?></p>


<form action="<?php echo e(route('notes.store', $client->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div>
        <label for="content">Add Note:</label>
        <textarea id="content" name="content" required></textarea>
    </div>
    <button type="submit">Add Note</button>
</form>

<h2>Notes</h2>
<?php if($client->notes->count()): ?>
    <ul>
        <?php $__currentLoopData = $client->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo e($loop->iteration); ?>.
                <?php echo e($note->content); ?>

                <?php if(Auth::id() === $note->user_id): ?>
                    <a href="<?php echo e(route('notes.edit', $note->id)); ?>">Edit</a>
                    <form action="<?php echo e(route('notes.destroy', $note->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">Delete</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <p>No notes available.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\mini-crm\resources\views/clients/show.blade.php ENDPATH**/ ?>