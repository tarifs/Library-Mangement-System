<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Notice</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('notices.update', $notice->id)); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>


                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="<?php echo e($notice->title); ?>" required autofocus>

                                <?php if($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                            <label for="description" class="col-md-4 control-label"><b>Description</b></label>

                            <div class="col-md-6">
                                <textarea name="description" id="codeEditor" rows="5" cols="5" class="form-control summernote"><?php echo e($notice->description); ?></textarea>

                                <?php if($errors->has('description')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                                <label for="image" class="col-md-4 control-label">Old Image</label>

                                <div class="col-md-6">
                                    <img src="<?php echo e($notice->image); ?>" alt="No Image" width="200px" height="100px">
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                                <label for="image" class="col-md-4 control-label">New Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image" value="<?php echo e(old('image')); ?>" autofocus>

                                    <?php if($errors->has('image')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('image')); ?></strong>
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
<!-- include summernote css/js -->

<script>
            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                enterMode: "keep",
                tabMode: "shift"
            });
            editor.setSize('100%','420px');
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>