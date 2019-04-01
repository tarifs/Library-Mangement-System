<?php $__env->startSection('content'); ?>
<style>
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
}
th, td {
	padding: 5px;
	text-align: left;    
}
</style>
<!-- banner -->
<div class="banner-bottom">
	<div class="container">
		
		<h1 class="text-center" style="background-color: #00ba66;">Our Location</h1><br>
		<div style="width: 100%; height: 500px;">
			<?php echo Mapper::render(); ?>

		</div><br><br>

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<table style="width:100%">
						<tr>
							<th class="text-center" style="background-color: #00ba66;">Central Library</th>
						</tr>
						<tr>
							<td>
								<p><?php echo e($central_lib->address); ?></p><br>
								<p><b>Phone:</b> <?php echo e($central_lib->Phone); ?></p>
								<p><b>Fax :</b> <?php echo e($central_lib->Fax); ?></p>
								<p><b>Email :</b> <?php echo e($central_lib->email); ?></p>
								<p><b>Website :</b> <?php echo e($central_lib->web); ?></p>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<table style="width:100%">
						<tr>
							<th class="text-center" style="background-color: #00ba66;">Medical Science & Dental Unit  Library</th>
						</tr>
						<tr>
							<td>
								<p><?php echo e($medical_lib->address); ?></p>
								<p><b>Phone:</b> <?php echo e($medical_lib->Phone); ?></p>
								<p><b>Fax :</b> <?php echo e($medical_lib->Fax); ?></p>
								<p><b>Email :</b> <?php echo e($medical_lib->email); ?></p>
								<p><b>Website :</b> <?php echo e($medical_lib->web); ?></p>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


</div>
<!-- //banner-bottom -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontEnd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>