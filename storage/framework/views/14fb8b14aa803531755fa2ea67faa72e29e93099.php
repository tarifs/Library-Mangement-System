<?php $__env->startSection('content'); ?>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h5>Edit Shelf</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="<?php echo e(route('shelves.update',$shelf->id)); ?>" method="post">
        <?php echo e(csrf_field()); ?>  <?php echo e(method_field('put')); ?>


        

        <div class="form-group">
          <label class="control-label col-sm-3" for="">shelf</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="name" value="<?php echo e($shelf->name); ?>"
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for=""></label>
          <div class="col-sm-6">
            <input class="btn btn-sm btn-primary pull-right" type="submit" name="submit" value="Update Shelf ">
          </div>
        </div>

      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>