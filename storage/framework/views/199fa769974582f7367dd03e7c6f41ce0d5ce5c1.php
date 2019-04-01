

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Show Notice</div>

                <div class="panel-body">

                  <div class="col-md-8">
                   <div style="padding-top:  30px;" class="form-group">
                    <label for="" class="col-md-4 control-label">Title:</label>

                    <div class="col-md-6">
                        <?php echo e($notice->title); ?>

                    </div>
                </div>  






                <div style="padding-top:  50px;" class="form-group">
                    <label for="" class="col-md-8 control-label">Description:</label>

                    <div class="col-md-12">
                        <textarea name="description" id="codeEditor" rows="5" cols="5" class="form-control summernote"><?php echo e($notice->description); ?></textarea>
                    </div>
                </div>      

            </div>


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