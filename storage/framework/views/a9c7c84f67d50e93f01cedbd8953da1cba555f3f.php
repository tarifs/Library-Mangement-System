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






                    <div style="padding-top:  30px;" class="form-group">
                                <label for="" class="col-md-4 control-label">Description:</label>

                                <div class="col-md-6">
                                    <textarea rows="10" cols="120"><?php echo $notice->description; ?></textarea>
                                </div>
                            </div>      

                   </div>


                      </div>



                  
               
                



                </div>
            </div>
        </div>
    </div>
<!-- include summernote css/js -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>