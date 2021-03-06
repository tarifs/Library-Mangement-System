<?php $__env->startSection('content'); ?>


<!-- banner -->
<div class="banner-bottom">
	<div class="container">
		<div class="filter-box">
			<h3>What are you looking for at the library?</h3>
			<form action="<?php echo e(route('book.search')); ?>" method="get" id="form1">
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<label class="sr-only" for="keywords">Search by Keyword</label>
						<input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text" required>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<select name="catalog" id="catalog" class="form-control" required>
							<option value="">Search the Catalog</option>
							<option value="title">Title</option>
							<option value="author">Author</option>
							<option value="isbn">ISBN</option>
							<option value="language">Language</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<input class="form-control" type="submit" value="Search" style="background-color: #00ba66;font-family: -webkit-body;font-size: 15px;font-weight: 900;">
					</div>
				</div>
			</form>
		</div>

		<table class="table data table-bordered">
			<thead>
				<th>Title</th>
				<th>Author</th>
				<th>Edition</th>
				<th>Session</th>
				<th>Image</th>
			</thead>
			<tbody>
				<?php if($books->count()): ?>
				<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td width="20%"><a href="<?php echo e(route('book.detail',$book->id)); ?>" style="color:blue"><?php echo e($book->title); ?></a></td>
					<td width="20%" ><?php echo e($book->author); ?></td>
					<td width="20%" ><?php echo e($book->edition); ?></td>
					<td width="20%" ><?php echo e($book->session); ?></td>
					<td width="20%" >
						<img width="80px" src="<?php echo e($book->image); ?>" alt="">
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
				<tr>
					<td colspan="5" style="text-align:center" class="blink_me"><span style="color:red">NO BOOKS FOUND</span></td>
				</tr>

				<?php endif; ?>

			</tbody>
		</table>
		
		

	</div>

</div>


</div>
<!-- //banner-bottom -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>