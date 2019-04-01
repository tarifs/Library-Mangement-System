<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><strong>Change Password </strong></h2></div>

                <div class="panel-body">
                    <div class="text-center">
                        <b>The password must be at least 6 character</b>
                    </div>

                    <form class="form-inline" action="<?php echo e(route('changePass')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        
                        <div class="form-group <?php echo e($errors->has('old_password') ? ' has-error' : ''); ?>">
                            <label class="col-sm-3 control-label">Old Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="old_password" value="" class="form-control">

                                <?php if($errors->has('old_password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('old_password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div><br><br>

                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <label class="col-sm-3 control-label">New Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="password" name="password" value="">

                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div><br><br>

                        <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                            <label class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="password" name="password_confirmation">

                                <?php if($errors->has('password_confirmation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    
                                </span>
                                <?php endif; ?>

                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <div>
                                <input style="margin-left: 90px" class="btn btn-primary" type="submit" name="" value="Enter">
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