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
		<script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
		<!-- //for bootstrap working -->
		<!-- here stars scrolling icon -->
		<script type="text/javascript">
			$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
				*/

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
