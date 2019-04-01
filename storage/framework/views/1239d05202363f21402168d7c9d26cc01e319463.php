<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Contact</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('contact.update', $contact->id)); ?>">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>


                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="<?php echo e($contact->address); ?>" required autofocus>

                                <?php if($errors->has('address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('Phone') ? ' has-error' : ''); ?>">
                            <label for="Phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="Phone" type="text" class="form-control" name="Phone" value="<?php echo e($contact->Phone); ?>" required autofocus>

                                <?php if($errors->has('Phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('Phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('Fax') ? ' has-error' : ''); ?>">
                            <label for="Fax" class="col-md-4 control-label">Fax</label>

                            <div class="col-md-6">
                                <input id="Fax" type="text" class="form-control" name="Fax" value="<?php echo e($contact->Fax); ?>" required autofocus>

                                <?php if($errors->has('Fax')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('Fax')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($contact->email); ?>">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('web') ? ' has-error' : ''); ?>">
                            <label for="web" class="col-md-4 control-label">Website</label>

                            <div class="col-md-6">
                                <input id="web" type="text" class="form-control" name="web" value="<?php echo e($contact->web); ?>" required autofocus>

                                <?php if($errors->has('web')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('web')); ?></strong>
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