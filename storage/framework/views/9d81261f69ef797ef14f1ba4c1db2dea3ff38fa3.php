<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        All Ebooks 
                    <span class="badge bg-info"><?php echo e($ebook->count()); ?></span>
                    </h2>
                </div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="<?php echo e(route('ebook.create')); ?>" class="btn btn-primary">Add new Ebook</a>
                    </div>
                </div>

                <div class="panel-body">
                  <table class="table datatable table-bordered">
                    <thead>
                      <th>Serial</th>
                      <th>File</th>
                      <th>Published</th>
                      <th>Action</th>
                    </thead>

                        <tbody>
                            <?php 
                                $i=1;
                             ?>
                            <?php if($ebook): ?>
                                <?php $__currentLoopData = $ebook; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shelf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($shelf->file); ?></td>
                                    <td><?php echo e($shelf->created_at->diffForHumans()); ?></td>
                                    <td>
                                      <form class="" action="<?php echo e(route('ebook.destroy',  $shelf->id)); ?>" method="post">
                                        <?php echo e(csrf_field()); ?> <?php echo e(method_field('delete')); ?>

                                        <input class="btn btn-danger" type="submit" name="" value="Delete">
                                      </form>
                                    </td>
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>