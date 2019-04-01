

<?php $__env->startSection('content'); ?>
<!-- banner -->
<div class="banner-bottom">
	<div class="container">
		
		<?php echo $about->body; ?>


	</div>
</div>


</div>
<!-- //banner-bottom -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>