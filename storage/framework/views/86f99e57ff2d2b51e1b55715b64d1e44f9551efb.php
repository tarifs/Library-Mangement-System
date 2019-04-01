<?php $__env->startSection('content'); ?>

<!-- banner -->
<div class="banner-bottom">
	<div class="container">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media  screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 30%;
}

.button:hover {
  background-color: #555;
}
</style>
</head>
<body>

	<h2>Librarians are tour-guides for all of knowledge.</h2>
	<p>Libraries were full of ideas – perhaps the most dangerous and powerful of all weapons.</p>
	<br>

	<div class="row">
		<?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="column">
				<div class="card">
					<img src="<?php echo e(asset('storage/staff/'. $staff->image)); ?>" alt="<?php echo e($staff->name); ?>" style="width:100%">
					<div class="container">
						<h2><?php echo e($staff->name); ?></h2>
						<p class="title"><?php echo e($staff->degree); ?></p>
						<p></p>
						<p><?php echo e($staff->cell); ?></p>
						<p><?php echo e($staff->email); ?></p>
						<p><button class="button"><?php echo e($staff->rank); ?></button></p>
					</div>
				</div><br>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>



</div>
</div>


</div>
<!-- //banner-bottom -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontEnd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>