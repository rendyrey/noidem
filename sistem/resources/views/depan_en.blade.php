<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PT Medion Farma Jaya</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
	</head>

	<body>
	<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a href="{{url('/')}}"><img src="assets/indonesia.png"></a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a href="{{url('/en')}}"><img src="assets/inggris.png"></a>
								&nbsp;&nbsp;&nbsp;								
							</div>
    <div class="main-container">
							<div class="col-sm-10 col-sm-offset-1">
								<!-- PAGE CONTENT BEGINS -->
								<h3 align="center">Welcome to Campus Recruitment</h3>
								<h3 align="center">PT Medion Farma Jaya</h3>

								<div class="error-container">
									<div class="well">
										<h4 class="grey lighter smaller">
											Make sure you
										</h4>

										<hr />
										<div>

											<ul class="list-unstyled spaced inline bigger-110 margin-15">
												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													already have "Event Code" Campus Recruitment you can earn on a job information poster mounted on a bulletin board or a college campus website.
												</li>

												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													Filling the data correctly.
												</li>

												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													Has never participated in the selection process PT Medion earlier.
												</li>

												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													Can take the test in accordance with a predetermined schedule.
												</li>
											</ul>
										</div>

										<hr />
										<div class="space"></div>

										<div class="center">
											<a href="#" class="btn btn-grey">
												Disagree
											</a>

											<a href="{{url('/1')}}" class="btn btn-primary">
												Agree
											</a>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
			<div class="footer">
				<div class="footer-inner">
						<img src="assets/medion_en.jpg" width="180px" height="100px">
				</div>
			</div>

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
