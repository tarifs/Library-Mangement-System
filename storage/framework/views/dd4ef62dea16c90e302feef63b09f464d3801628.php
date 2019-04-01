<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><strong>Update Book </strong></h2></div>

                    <div class="panel-body">

                        

                        <form class="form-horizontal" method="post" action="<?php echo e(route('books.update', $book->id)); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?> <?php echo e(method_field('put')); ?>


                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="title" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="<?php echo e($book->title); ?>">

                                    <?php if($errors->has('title')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('author') ? ' has-error' : ''); ?>">
                                <label for="author" class="col-md-4 control-label">Author</label>

                                <div class="col-md-6">
                                    <input id="author" type="text" class="form-control" name="author" value="<?php echo e($book->author); ?>">

                                    <?php if($errors->has('author')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('author')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('edition') ? ' has-error' : ''); ?>">
                                <label for="edition" class="col-md-4 control-label">Edition</label>

                                <div class="col-md-6">
                                    <input id="edition" type="text" class="form-control" name="edition" value="<?php echo e($book->edition); ?>">

                                    <?php if($errors->has('edition')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('edition')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('session') ? ' has-error' : ''); ?>">
                                <label for="session" class="col-md-4 control-label">Session</label>

                                <div class="col-md-6">
                                    <input id="session" type="text" class="form-control" name="session" value="<?php echo e($book->session); ?>">

                                    <?php if($errors->has('session')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('session')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                                <label for="categories" class="col-md-4 control-label">Department</label>
                                <div class="col-md-6">
                                    <select name="category_id" id="category" onchange="getSubCategory(this.value)" class="form-control">
                                        <option value="<?php echo e($book->category->id); ?>"><?php echo e($book->category->name); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <optgroup>
                                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                            </optgroup>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('category_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('sub_category_id') ? ' has-error' : ''); ?>">
                                <label for="categories" class="col-md-4 control-label">Subject</label>
                                <div class="col-md-6">
                                    <select name="sub_category_id" id="sub_category" class="form-control">
                                        <option value="<?php echo e($book->sub_category ? $book->sub_category->id : ''); ?>"><?php echo e($book->sub_category ? $book->sub_category->name : ''); ?></option>
                                    </select>
                                    <?php if($errors->has('sub_category_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group<?php echo e($errors->has('page') ? ' has-error' : ''); ?>">
                                <label for="page" class="col-md-4 control-label">Page</label>

                                <div class="col-md-6">
                                    <input id="page" type="text" class="form-control" name="page" value="<?php echo e($book->page); ?>">

                                    <?php if($errors->has('page')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('page')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('publisher') ? ' has-error' : ''); ?>">
                                <label for="publisher" class="col-md-4 control-label">Publisher</label>

                                <div class="col-md-6">
                                    <input id="publisher" type="text" class="form-control" name="publisher" value="<?php echo e($book->publisher); ?>">

                                    <?php if($errors->has('publisher')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('publisher')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('language') ? ' has-error' : ''); ?>">
                                <label for="language" class="col-md-4 control-label">Language</label>

                                <div class="col-md-6">
                                    <input id="language" type="text" class="form-control" name="language" value="<?php echo e($book->language); ?>">

                                    <?php if($errors->has('language')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('language')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('isbn') ? ' has-error' : ''); ?>">
                                <label for="isbn" class="col-md-4 control-label">ISBN</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="isbn" value="<?php echo e($book->isbn); ?>">

                                    <?php if($errors->has('isbn')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('isbn')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('purchase_date') ? ' has-error' : ''); ?>">
                                <label for="purchase_date" class="col-md-4 control-label">Purchase Date</label>

                                <div class="col-md-6">
                                    <input id="purchase_date" type="date" class="form-control" name="purchase_date" value="<?php echo e($book->purchase_date); ?>">

                                    <?php if($errors->has('purchase_date')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('purchase_date')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('accession_no') ? ' has-error' : ''); ?>">
                                <label for="accession_no" class="col-md-4 control-label">Accession No</label>

                                <div class="col-md-6">
                                    <input id="accession_no" type="number" class="form-control" name="accession_no" value="<?php echo e($book->accession_no); ?>">

                                    <?php if($errors->has('accession_no')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('accession_no')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('doa') ? ' has-error' : ''); ?>">
                                <label for="doa" class="col-md-4 control-label">Date of Accession</label>

                                <div class="col-md-6">
                                    <input id="doa" type="date" class="form-control" name="doa" value="<?php echo e($book->doa); ?>">

                                    <?php if($errors->has('doa')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('doa')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('quantity') ? ' has-error' : ''); ?>">
                                <label for="quantity" class="col-md-4 control-label">Quantity</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="number" class="form-control" name="quantity" value="<?php echo e($book->quantity); ?>">

                                    <?php if($errors->has('quantity')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('quantity')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <label for="price" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price" value="<?php echo e($book->price); ?>">

                                    <?php if($errors->has('price')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('price')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('call_no') ? ' has-error' : ''); ?>">
                                <label for="call_no" class="col-md-4 control-label">Call No</label>

                                <div class="col-md-6">
                                    <input id="call_no" type="text" class="form-control" name="call_no" value="<?php echo e($book->call_no); ?>">

                                    <?php if($errors->has('call_no')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('call_no')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('shelf_id') ? ' has-error' : ''); ?>">
                                <label for="shelves" class="col-md-4 control-label">Shelf</label>

                                <div class="col-md-6">
                                    <select name="shelf_id" class="form-control">
                                        <option value="<?php echo e($book->shelf->id); ?>"><?php echo e($book->shelf->name); ?></option>

                                        <?php $__currentLoopData = $shelves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shelf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <optgroup>

                                                <option value="<?php echo e($shelf->id); ?>"><?php echo e($shelf->name); ?></option>

                                            </optgroup>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if($errors->has('shelf_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('shelf_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                                <label for="image" class="col-md-4 control-label">Old Book Image</label>

                                <div class="col-md-6">
                                    <img src="<?php echo e($book->image); ?>" alt="No Image" width="200px" height="100px">
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                                <label for="image" class="col-md-4 control-label">New Book Image</label>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        function getSubCategory(val) {
            $.ajax({
                type: "get",
                url: "<?php echo e(route('sub.category.ajax')); ?>",
                data:{category_id : val},
                success: function(data){
                    $('#sub_category').html("<option value=\"\">Choose</option>");
                    $.each(data, function(key, value) {
                        $('#sub_category')
                        .append($("<option></option>")
                        .attr("value",value.id)
                        .text(value.name));
                    });
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>