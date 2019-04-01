<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('staffs.update', $staff->id)); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($staff->name); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('degree') ? ' has-error' : ''); ?>">
                            <label for="degree" class="col-md-4 control-label">Degree</label>

                            <div class="col-md-6">
                                <input id="degree" type="text" class="form-control" name="degree" value="<?php echo e($staff->degree); ?>" required autofocus>

                                <?php if($errors->has('degree')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('degree')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('rank') ? ' has-error' : ''); ?>">
                            <label for="rank" class="col-md-4 control-label">Rank</label>

                            <div class="col-md-6">
                                <input id="rank" type="text" class="form-control" name="rank" value="<?php echo e($staff->rank); ?>" required autofocus>

                                <?php if($errors->has('rank')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('rank')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($staff->email); ?>">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('cell') ? ' has-error' : ''); ?>">
                            <label for="cell" class="col-md-4 control-label">Cell</label>

                            <div class="col-md-6">
                                <input id="cell" type="text" class="form-control" name="cell" value="<?php echo e($staff->cell); ?>">

                                <?php if($errors->has('cell')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('cell')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Old Image</label>

                            <div class="col-md-6">
                                <img src="<?php echo e($staff->image); ?>" alt="No Image" width="100px" height="100px">

                            <?php if($errors->has('image')): ?>
                                <span class="help-block">
                                    <strong style="color:#a94442"><?php echo e($errors->first('image')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="image" >

                            <?php if($errors->has('image')): ?>
                                <span class="help-block">
                                    <strong style="color:#a94442"><?php echo e($errors->first('image')); ?></strong>
                                </span>
                            <?php else: ?>
                                <span class="help-block">
                                    Only image supported
                                </span>
                            <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>