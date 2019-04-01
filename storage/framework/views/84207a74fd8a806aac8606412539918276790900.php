  

  <?php $__env->startSection('content'); ?>

  <div class="container">

    <h2>Librarians are tour-guides for all of knowledge.</h2>
    <p>Libraries were full of ideas – perhaps the most dangerous and powerful of all weapons.</p>
    
    <br>

<div class="container-fluid">
    <div class="col-md-12">
      <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="<?php echo e($staff->image); ?>" class="img-rounded" alt="<?php echo e($staff->name); ?>">
              <div>
                <h4><?php echo e($staff->name); ?></h4>
                <p><?php echo e($staff->degree); ?></p>
                <p><?php echo e($staff->cell); ?></p>
                
                <hr>
                <p class="text-center">
                  <a href="" class="btn btn-success btn-sm"><?php echo e($staff->rank); ?></a>
                </p>
              </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  </div>



  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>