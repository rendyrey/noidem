<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Form Lamaran</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
	</head>
	<style type="text/css">
		#spinner {

	    background: #FFFFFF;
		filter:alpha(opacity=60); /* IE */
		-moz-opacity:0.5; /* Mozilla */
		opacity: 0.5; /* CSS3 */
		position: fixed; height: 100%;
		width:100%;
		text-align:center;
	 	overflow: auto;
	 	z-index:1234; 

	}

		.img_loader {

	    position: absolute;
	    margin: auto;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;

	}
	</style>

	<body class="login-layout light-login" background="assets/2.jpeg">
	<div id="spinner" style="display:none;">
    <img class="img_loader" src="assets/loader2.gif" alt="Loading" />
	</div>	
		<div class="main-container">		
			<div class="main-content">
				<div class="row">			
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									
									<span class="red">Form Lamaran</span>
									<span class="white" id="id-text2">- Login</span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information<br/>
												email : user@medion.co.id, password: coba123
											</h4>

											<div class="space-6"></div>

											<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" id="form_login">
											{{ csrf_field() }}
											
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="email" class="form-control" placeholder="Email" id="email" />
															<i class="ace-icon fa fa-user"></i>
															@if ($errors->has('email'))
							                                    <span class="help-block">
							                                        <strong>{{ $errors->first('email') }}</strong>
							                                    </span>
							                                @endif
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" id="password" />
															<i class="ace-icon fa fa-lock"></i>
															@if ($errors->has('password'))
							                                    <span class="help-block">
							                                        <strong>{{ $errors->first('password') }}</strong>
							                                    </span>
							                                @endif
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary" id="submit">
															<i class="ace-icon fa fa-sign-in"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
		$(document).ready(function(){
		    $("#spinner").bind("ajaxSend", function() {
		        $(this).show();
		    }).bind("ajaxStop", function() {
		        $(this).hide();
		    }).bind("ajaxError", function() {
		        $(this).hide();
		    });

		    $('#submit').click(function() {
		        $('#spinner').show();
		    });
		 
		 });
		</script>
	</body>
</html>
