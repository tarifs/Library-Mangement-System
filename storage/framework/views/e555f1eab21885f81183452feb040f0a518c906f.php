<!DOCTYPE html>
<html lang="en">
<head>
	<title>LMS-Library Management System</title>
	<link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />
	<!-- custom-theme -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Mastering Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link href="<?php echo e(asset('frontEnd/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo e(asset('frontEnd/css/JiSlider.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('frontEnd/css/flexslider.css')); ?>" type="text/css" media="screen" property="" />

<link href="<?php echo e(asset('frontEnd/css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="<?php echo e(asset('frontEnd/css/flexslider.css')); ?>" type="text/css" media="screen" property="" />


<link href="<?php echo e(asset('css/toastr.min.css')); ?>" rel="stylesheet">


<?php echo $__env->make('includes.blinker', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- font-awesome-icons -->
<link href="<?php echo e(asset('frontEnd/css/font-awesome.css')); ?>" rel="stylesheet">
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>

	
	<style>
	.dropdown-menu a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-menu {display: block;}

	.dropdown:hover .dropbtn {background-color: ;}
</style>
<style type="text/css">
/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 1000px;
    overflow-y: auto;
}
</style>

<!-- banner -->
<div class="main_section_agile">

	<div class="agileits_w3layouts_banner_nav">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<h1><a class="navbar-brand" href="/"><i>GB</i><span>Library</span></a></h1>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="menu--iris">
					<ul class="nav navbar-nav menu__list">
						<li class="menu__item "><a href="/" class="menu__link">Home</a></li>
						<li class="menu__item"><a href="#" class="menu__link">Services</a></li>
						<li class="menu__item"><a href="#" class="menu__link">Gallery</a></li>

						<li class="dropdown menu__item">
							<a href="#" class="dropdown-toggle menu__link dropbtn" data-toggle="dropdown">Repositories <b class="caret"></b></a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li><a href="#">e-Journals</a></li>
								<li><a href="#">e-Books</a></li>
								<li><a href="#">e-Thesis</a></li>
								<li><a href="#">e-News Clipping</a></li>
								<li><a href="typography.html">Faculty Resource</a></li>
							</ul>
						</li>
						<li class="menu__item"><a href="#" class="menu__link">About Us</a></li>


						<?php if(!Auth::check()): ?>

						<li class="menu__item"><a class="menu__link" href="" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a> </li>
						<li class="menu__item"><a class="menu__link" href="" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Register</a> </li>
						<?php else: ?>
						<li class="menu__item"><a href="<?php echo e(route('home')); ?>" class="menu__link">My panel</a></li>

						<li class="menu__item">
							<form  action="<?php echo e(route('logout')); ?>" method="POST" >
								<?php echo e(csrf_field()); ?>

								<button type="submit" class="menu__link"><b>Logout</b></button>
							</form>
						</li>
						<?php endif; ?>

					</ul>


				</nav>
			</div>
		</nav>
	</div>
</div>

<!-- //banner -->
<!-- Modal1 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<div class="signin-form profile">
					<h3 class="agileinfo_sign">Login</h3>
					<div class="login-form">
						<form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
							<?php echo e(csrf_field()); ?>


							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">


								<div>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"  autofocus placeholder="E-Mail Address">

									<?php if($errors->has('email')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('email')); ?></strong>
									</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">


								<div>
									<input id="password" type="password" class="form-control" name="password"  placeholder="Password">

									<?php if($errors->has('password')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('password')); ?></strong>
									</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="tp">
									<input type="submit" name="login" value="login">

									
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Modal1 -->

<!-- Modal2 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<div class="signin-form profile">
					<h3 class="agileinfo_sign">Registration</h3>
					<div class="login-form">
						<form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>


							<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">


								<div>
									<input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"  autofocus placeholder="Name">

									<?php if($errors->has('name')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('name')); ?></strong>
									</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">


								<div>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"  placeholder="E-Mail Address">

									<?php if($errors->has('email')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('email')); ?></strong>
									</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">


								<div>
									<input id="password" type="password" class="form-control" name="password"  placeholder="Password">

									<?php if($errors->has('password')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('password')); ?></strong>
									</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">


								<div>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password">
								</div>
							</div>

							<div class="form-group">


								<div>
									<input id="" type="file" class="form-control" name="avatar" placeholder="Avatar">

									<?php if($errors->has('avatar')): ?>
									<span class="help-block">
										<strong style="color:#a94442"><?php echo e($errors->first('avatar')); ?></strong>
									</span>
									<?php else: ?>
									<span class="help-block">
										Profile Image
									</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">


								<div>
									<input id="" type="file" class="form-control" name="identity" placeholder="Identity">

									<?php if($errors->has('identity')): ?>
									<span class="help-block">
										<strong style="color:#a94442"><?php echo e($errors->first('identity')); ?></strong>
									</span>
									<?php else: ?>
									<span class="help-block">
										ID CARD
									</span>
									<?php endif; ?>
								</div>
							</div>

							

							<div class="form-group">
								<div class="tp">
									<input type="submit" name="register" value="register">
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Modal2 -->

<!-- bootstrap-pop-up Modal -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
	<div class="modal-dialog" style="width: 750px;" role="document">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<section>
				<div class="modal-body">

				</div>
			</section>
		</div>
	</div>
</div>
<!-- End bootstrap-pop-up Modal -->




<?php echo $__env->yieldContent('content'); ?>



<!-- blog -->
<div class="blog" id="blog">
	<div class="container">

		<h3 class="w3l_header w3_agileits_header"> Latest <span>  Notices</span></h3>
		<div class="agile_inner_w3ls-grids">
			<marquee behavior="scroll" direction="left" scrollamount="15" onmouseover="this.stop();" onmouseout="this.start();">
				<?php if($notices): ?>
				<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<div class="col-sm-6 w3-agile-post-grids">
					<div class="w3-agile-post-img w3-agile-post-img2">
						<a href="javascript:void(0);" class="openBtn" data-id="<?php echo e($notice->id); ?>">
							<img src="<?php echo e($notice->getOriginal('image') ? $notice->image : 'Notice'); ?>" width="540px" height="400px">
						</a>
					</div>
					<div class="w3-agile-post-info">
						<h4><a href="javascript:void(0);" class="openBtn" data-id="<?php echo e($notice->id); ?>"><?php echo e(str_limit($notice->title, 30)); ?></a></h4>
						<ul>
							<li>Admin</li>
							<li><?php echo e($notice->created_at->toDateString()); ?></li>
						</ul>
						
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<div class="clearfix"> </div>
			</marquee>
		</div>
	</div>
</div>
<!-- //blog -->

<!-- footer -->
<div class="footer">
	<div class="f-bg-w3l">
		<div class="container">
			<div class="col-md-4 w3layouts_footer_grid">
				<h2>Follow <span>Us</span></h2>
				<ul class="social_agileinfo">
					<li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
			<div class="col-md-4 w3layouts_footer_grid">

				<h2>Quick <span>Links</span></h2>

				<ul>
					<li><p><a href="#">Library News</a></p></li>
					<li><p><a href="#">History</a></p></li>
					<li><p><a href="#">Meet Our Staff</a></p></li>
					<li><p><a href="#">Board of Trustees</a></p></li>
					<li><p><a href="#">Budget</a></p></li>
					<li><p><a href="#">Annual Report</a></p></li>
				</ul>

			</div>
			<div class="col-md-4 w3layouts_footer_grid">
				<h2>About <span>Library</span></h2>
				<p>
					It is a long established fact that a reader will be distracted by the readable content of a page when looking.
				</p>

				<div class="fa fa-location-arrow">

					<p>Nolam, P.O. Mirzanagar via Savar Cantonment,
					Ashulia, Savar, Dhaka-1344.</p>
				</div>
				<div class="fa fa-envelope">

					<p><a href="mailto:support@libraria.com">admin@gonouniversity.edu.bd</a></p>
				</div>
				<div class="fa fa-phone">

					<p><a href="tel:012-345-6789">+ 012-345-6789</a></p>
				</div>


			</div>


		</div> <br>
		<div class="col-md-12 w3layouts_footer_grid text-center">
			<p>© <?php echo date("Y"); ?> GONO LIBRARY. All Rights Reserved | Developed by <a href="<?php echo e(route('developers')); ?>" class="blink_me" style="color:#33cc99" target="_blank" >Coding Birds</a> of CSE 19th Batch</p>
		</div>
	</div>


	<div class="clearfix"> </div>

</div>
</div>

</div>

<!-- //footer -->
<!-- start-smoth-scrolling -->
<!-- js -->
<script type="text/javascript" src="<?php echo e(asset('frontEnd/js/jquery-2.1.4.min.js')); ?>"></script>
<!-- //js -->
<script src="<?php echo e(asset('frontEnd/js/JiSlider.js')); ?>"></script>
<script>
	$(window).load(function () {
		$('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: true}).addClass('ff')
	})
</script><script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-36251023-1']);
	_gaq.push(['_setDomainName', 'jqueryscript.net']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>
<script type="text/javascript">
	$(document).ready(function() {
            $('.openBtn').click(function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                console.log(id);
                let url = '<?php echo e(route('notice')); ?>';
                $.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        id: id
                    },
                    dataType: 'JSON'
                }).done(function(data) {
                    $('.modal-body').html(data.html);
                });
                $('#myModal').modal('show');
            });
        });
</script>
		<!-- stats
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script> -->
		<!-- //stats -->
		<!-- //footer -->
		<!-- flexSlider -->
		<!-- <script defer src="js/jquery.flexslider.js"></script>
		<script type="text/javascript">
			$(window).load(function(){
				$('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
						$('body').removeClass('loading');
					}
				});
			});
		</script> -->
		<!-- //flexSlider -->


		<script type="text/javascript" src="<?php echo e(asset('frontEnd/js/move-top.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('frontEnd/js/easing.js')); ?>"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		<!-- start-smoth-scrolling -->
		<!-- for bootstrap working -->
		<script src="<?php echo e(asset('frontEnd/js/bootstrap.js')); ?>"></script>
		<!-- //for bootstrap working -->
		<!-- here stars scrolling icon -->
		<script type="text/javascript">
			$(document).ready(function() {

				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};


				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>
		<!-- //here ends scrolling icon -->

		
		<script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
		<script>
			<?php if(Session::has('success')): ?>

			toastr.success('<?php echo e(Session::get('success')); ?>')

			<?php endif; ?>

			<?php if(Session::has('info')): ?>

			toastr.info('<?php echo e(Session::get('info')); ?>')

			<?php endif; ?>

			<?php if(Session::has('fail')): ?>

			toastr.error('<?php echo e(Session::get('fail')); ?>')

			<?php endif; ?>

			<?php if(Session::has('warning')): ?>

			toastr.warning('<?php echo e(Session::get('warning')); ?>')

			<?php endif; ?>

		</script>
	</body>
	</html>
