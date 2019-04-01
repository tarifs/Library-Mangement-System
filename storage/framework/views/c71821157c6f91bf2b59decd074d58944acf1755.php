<?php $__env->startSection('content'); ?>

<!-- banner -->

<div class="col-sm-12">
	<h1 style="text-align:center; color:#00ba66; margin:0" class="">EBOOKS</h1>
</div>
<div class="banner-bottom">

	<div class="container">


		

			

			
				
					
						<div class="col-md-3">
							
						</div>
						<div class="col-md-6">
							<table class="table">
								<?php if($ebooks->count() > 0): ?>
								<th>Name</th>
								<th>File</th>

								<tbody>
									
									<?php $__currentLoopData = $ebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td width="100%">
											<a href=""><?php echo e($ebook->file); ?></a>
										</td>
										<td>
											<a class="btn btn-xs btn-primary" href="uploads/file/<?php echo e($ebook->file); ?>" download="<?php echo e($ebook->file); ?>">Download</a>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
									<h4 class="text-center" style="color: red">Not Available</h4>
									<?php endif; ?>




								</tbody>
							</table>
							
						</div>

					

				

			
			

		</div>

	</tbody>
	<div class="text-center">
		<?php echo e($ebooks->links()); ?>

	</div>
</table>



</div>


</div>



</div>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->

<!-- //banner-bottom -->


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>