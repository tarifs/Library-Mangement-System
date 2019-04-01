<?php $__env->startSection('content'); ?>


<?php echo $__env->make('includes.blinker', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                <h1 class="" style="padding-left: 620px;">Welcome <?php echo e(Auth::user()->name); ?></h1>
                <?php if(Auth::user()->is_admin): ?>

                    <div class="col-md-12" style="padding: 40px;">
                        <div class="col-md-5">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo e(route('users.index')); ?>'">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo e($user_count); ?></div>
                                    <div class="widget-title">Registered users</div>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo e(route('books.index')); ?>'">
                                <div class="widget-item-left">
                                    <span class="fa fa-book"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo e($book_count); ?></div>
                                    <div class="widget-title">Books in Library</div>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                    </div>

                    <div class="col-md-12" style="padding: 40px;">
                        <div class="col-md-5">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo e(route('category.index')); ?>'">
                                <div class="widget-item-left">
                                    <span class="fa fa-tasks"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo e($category_count); ?></div>
                                    <div class="widget-title">Categories</div>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo e(route('shelves.index')); ?>'">
                                <div class="widget-item-left">
                                    <span class="fa fa-database"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo e($shelf_count); ?></div>
                                    <div class="widget-title">Shelves in Library</div>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                    </div>

                    <div class="col-md-12" style="padding: 40px;padding-bottom: 80px;">
                        <div class="col-md-5">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo e(route('issue.index')); ?>'">
                                <div class="widget-item-left">
                                    <span class="fa fa-thumb-tack"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo e($issued_count); ?></div>
                                    <div class="widget-title">Books Issued</div>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo e(route('issue.returned')); ?>'">
                                <div class="widget-item-left">
                                    <span class="fa fa-archive"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo e($returned_count); ?></div>
                                    <div class="widget-title">Books Returnd</div>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                    </div>

                <?php else: ?>


                    <?php if($issueBooks): ?>

                        <div class="col-md-12" style="padding: 40px;">
                        <div class="col-md-5" style="border: 2px solid gray">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-book"></span>
                                </div>
                                <div class="widget-data">
                                    <h4 class="text-success">Pending Books</h4>
                                    <ul class="list-group ">
                                        <?php if(count($issueBooks)): ?>
                                            <?php $__currentLoopData = $issueBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item">
                                                 <?php echo e($book->book->title); ?> book | <span <?php if(date('Y-m-d') == $book->return_date || date('Y-m-d') > $book->return_date): ?>
                                                    class="blink_me "
                                                    <?php endif; ?>>Dateline : <?php echo e($book->return_date); ?></span>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <h4>No Book issued :)</h4>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->
                        </div>
                        <div class="col-md-1"></div>

                        <?php if(count($issueBooks)): ?>
                            <div class="col-md-5" style="border: 2px solid gray">
                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="fa fa-warning blink_me" style="font-size:48px;color:red"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="col-sm-12">
                                            <h4 class="text-warning">Warning Message</h4>
                                            <ul class="list-group ">
                                                <?php $__currentLoopData = $issueBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(date('Y-m-d') == $book->return_date || date('Y-m-d') > $book->return_date): ?>
                                                        <li class="list-group-item">
                                                            <?php echo e($book->book->title); ?> book | <span class="blink_me">
                                                                Dateline over!<br>
                                                                Kindly return this book ASAP.Otherwise you will be charged 1tk/day. <br>
                                                            </span>
                                                            
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET REGISTRED -->
                            </div>
                        </div>

                                <div class="col-md-12" style="padding: 40px;">
                                    <div class="col-md-5" style="border: 2px solid gray">
                                        <!-- START WIDGET REGISTRED -->
                                        <div class="widget widget-default widget-item-icon">
                                            <div class="widget-item-left">
                                                <span class="fa fa-try"></span>
                                            </div>
                                            <div class="widget-data">
                                                <div class="col-sm-12">
                                                    <h4 class="text-success">Fine Books</h4>
                                                    <ul class="list-group ">
                                                        <?php 
                                                            $total_fine=0;
                                                         ?>

                                                        <?php if(count($fines)): ?>
                                                            <?php $__currentLoopData = $fines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="list-group-item">
                                                                    <?php echo e($fine->issuBook->book->title); ?>

                                                                    book | <span class="blink_me ">Fine : <?php echo e($fine->fine); ?> TK</span>
                                                                </li>
                                                                <?php 
                                                                    $total_fine += $fine->fine
                                                                 ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <h4>No Book fined :)</h4>
                                                        <?php endif; ?>
                                                    </ul>
                                                    <div style="padding-top: 15px" class="pull-right">
                                                        <strong>Total Fine: <?php echo e($total_fine); ?> TK</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET REGISTRED -->
                                    </div>
                                </div>
                        <?php endif; ?>


                    <?php endif; ?>
                <?php endif; ?>


            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>