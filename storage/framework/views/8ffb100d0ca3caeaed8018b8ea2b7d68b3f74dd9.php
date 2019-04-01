<?php $__env->startSection('content'); ?>
<!-- banner -->
<div class="col-sm-12">
	<h1 style="text-align:center; color:#00ba66; margin:0" class="">EBOOKS</h1>
</div>
<div class="banner-bottom">

	<div class="container">


		<div class="col-sm-12">

			<div class="col-sm-12">
				<hr style="border-top: 1px solid #a9a9a9;">
			</div>

			<div class="col-sm-12">
				<div class="col-sm-12" style="background:white;padding:20px;font-size:15">
					<div class="col-sm-12"><br>
						<div class="col-sm-6">
							<table>

								<tbody>
									<?php if($ebook->count() > 0): ?>
									<?php $__currentLoopData = $ebook; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td width="2%">
											<a href=""><?php echo e($e->file); ?></a>
										</td>
										<td width="20%">
											<a class="btn btn-xs btn-primary" href="uploads/file/<?php echo e($e->file); ?>" download="<?php echo e($e->file); ?>">Download</a>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
									<h4 class="text-center" style="padding-left: 70%">Not Available</h4>
									<?php endif; ?>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>


	</tbody>
</table>

</div>
</div>


</div>
<!-- //banner-bottom -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>