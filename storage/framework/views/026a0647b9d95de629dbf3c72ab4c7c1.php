<?php $__env->startSection('content'); ?>
<h2>Edit Note for <?php echo e($client->name); ?></h2>
<form action="<?php echo e(route('notes.update', $note->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div>
        <label for="content">Note Content:</label>
        <textarea id="content" name="content" rows="4" required><?php echo e(old('content', $note->content)); ?></textarea>
    </div>
    <button type="submit">Update Note</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\mini-crm\resources\views/notes/edit.blade.php ENDPATH**/ ?>