<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>Library Mangement System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon" />
    <!-- END META SECTION -->


<link rel="stylesheet" type="text/css" id="theme" href="<?php echo e(asset('admin/css/theme-blue.css')); ?>"/>


<link href="<?php echo e(asset('css/toastr.min.css')); ?>" rel="stylesheet">

<!-- EOF CSS INCLUDE -->
<style media="screen">
.no-borderd tr td{
    border: 0 solid !important;
}
</style>
</head>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="/">LMS</a>
                    <a href="/" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="" class="profile-mini">
                        <img src="<?php echo e(asset('assets/images/users/avatar.jpg')); ?>" alt="Mamun"/>
                    </a>
                    <div class="profile">
                        <div class="profile-image">
                            <img src="<?php echo e(asset('uploads/avatar/'. Auth::user()->avatar)); ?>" alt="John Doe"/>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?php echo e(Auth::user()->name); ?></div>
                        </div>

                    </div>
                </li>
                <li class="xn-title">Navigation</li>
                <li >
                    <a href="<?php echo e(route('home')); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                </li>

                
                
                <?php if(!Auth::user()->is_admin): ?>
                    <li >
                        <a href="<?php echo e(route('user.bookList')); ?>"><span class="fa fa-users"></span> <span class="xn-text">Book List</span></a>
                    </li>
                    <li >
                        <a href="<?php echo e(route('user.issueBooks')); ?>"><span class="fa fa-thumb-tack"></span> <span class="xn-text">My Issued Books</span></a>
                    </li>
                    <li >
                        <a href="<?php echo e(route('user.issueBooksReturned')); ?>"><span class="fa fa-archive"></span> <span class="xn-text">My Returned Books</span></a>
                    </li>
                <?php endif; ?>

                
                
                
                <?php if(Auth::user()->is_admin): ?>
                    <li>
                        <a href="<?php echo e(route('users.index')); ?>"><span class="fa fa-users"></span> <span class="xn-text">Users</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-book"></span> <span class="xn-text">Books</span></a>
                        <ul>
                            <li>
                                <a href="<?php echo e(route('books.index')); ?>"><span class="fa fa-list-alt"></span> <span class="xn-text">Book List</span></a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="<?php echo e(route('books.create')); ?>"><span class="fa fa-plus"></span> <span class="xn-text">Add Books</span></a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="<?php echo e(route('category.index')); ?>"><span class="fa fa-tasks"></span> <span class="xn-text">Categories</span></a>
                    </li>
                    <li >
                        <a href="<?php echo e(route('shelves.index')); ?>"><span class="fa fa-database"></span> <span class="xn-text">Book Shelves</span></a>
                    </li>
                    <li >
                        <a href="<?php echo e(route('issue.index')); ?>"><span class="fa fa-thumb-tack"></span> <span class="xn-text">Book Issued List</span></a>
                    </li>
                    <li >
                        <a href="<?php echo e(route('issue.returned')); ?>"><span class="fa fa-archive"></span> <span class="xn-text">Book Returned List</span></a>
                    </li>

                    
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-book"></span> <span class="xn-text">Blog Management</span></a>
                        <ul>
                            <li>
                                <a href="<?php echo e(route('notices.index')); ?>"><span class="fa fa-list-alt"></span> <span class="xn-text">Notices</span></a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href=""><span class="fa fa-plus"></span> <span class="xn-text">Add Books</span></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>



                

            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>

                <?php if(Auth::user()->is_admin): ?>
                    <li class="pull-right ">
                        <a href="<?php echo e(route('users.unapproved')); ?>"
                        style="padding: 5px;margin-top: 10px;border-radius: 6px; background-color:#007bff"
                        class="btn btn-primary">
                        New User
                        <span class="badge badge-success">
                            <?php echo e($unapproved_users); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>


            <!-- END TASKS -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->



        <!-- PAGE CONTENT WRAPPER -->
        <div style="padding-top: 10px" class="col-md-12">
            <div class="page-content-wrap">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <form  action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>


                        <input class="btn btn-success btn-lg" type="submit" value="Yes">
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/jquery/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/jquery/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='<?php echo e(asset('admin/js/plugins/icheck/icheck.min.js')); ?>'></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/scrolltotop/scrolltopcontrol.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/morris/raphael-min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/morris/morris.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/rickshaw/d3.v3.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/rickshaw/rickshaw.min.js')); ?>"></script>
<script type='text/javascript' src='<?php echo e(asset('admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>'></script>
<script type='text/javascript' src='<?php echo e(asset('admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>'></script>
<script type='text/javascript' src='<?php echo e(asset('admin/js/plugins/bootstrap/bootstrap-datepicker.js')); ?>'></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/owl/owl.carousel.min.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>


<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/summernote/summernote.js')); ?>"></script>

<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="<?php echo e(asset('admin/js/settings.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/actions.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin/js/demo_dashboard.js')); ?>"></script>
<!-- END TEMPLATE -->


<script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
<script>
<?php if(Session::has('success')): ?>

toastr.success('<?php echo e(Session::get('success')); ?>')

<?php endif; ?>

<?php if(Session::has('fail')): ?>

toastr.info('<?php echo e(Session::get('fail')); ?>')

<?php endif; ?>

</script>


<?php echo $__env->yieldContent('js'); ?>
<!-- END SCRIPTS -->
</body>
</html>
