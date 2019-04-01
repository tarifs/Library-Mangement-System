<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Library About</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('about.update', $about->id)); ?>">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>


                        <div class="form-group<?php echo e($errors->has('body') ? ' has-error' : ''); ?>">
                            <label for="body" class="col-md-4 control-label"><b>Description</b></label>

                            <div class="col-md-6">
                                <textarea name="body" id="codeEditor" rows="5" cols="5" class="form-control summernote"><?php echo e($about->body); ?></textarea>

                                <?php if($errors->has('body')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('body')); ?></strong>
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