<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Parliament HR Management System</title>
	<meta name="description" content="Parliament HR Management System" />
	<meta name="keywords" content="hr, hris, hrms, vanuatu, system, information" />
	<meta name="author" content="CNS, Ltd." />

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- vector map CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Alerts CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="<?= base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Alert -->
	<?php if ($this->session->flashdata('message')) : ?>
		<div hidden id="message-login-page">
			<?= $this->session->flashdata('message'); ?>
		</div>
	<?php endif; ?>

	<!--Flash Screen-->
	<div class="splash">
		<img class="fade-in-splash" src="<?= base_url(); ?>assets/dist/img/logo-3.png" alt="logo" width="250">
		<h4 class="fade-in-splash">
			Parliament HR Management System
		</h4>
	</div>

	<!-- Main Content -->
	<div class="page-wrapper pa-0 ma-0 auth-page">
		<div class="container-fluid">
			<!-- Row -->
			<div class="table-struct full-width full-height">
				<div class="table-cell vertical-align-middle auth-form-wrap" style="padding-top: 0; padding-bottom: 0;">
					<div class="auth-form ml-auto mr-auto no-float">
						<table class="logo-center">
							<tr>
								<a href="<?= base_url(); ?>dashboard">
									<td align="center">
										<img class="" src="<?= base_url(); ?>assets/dist/img/logo-3.png" width="150" height="153" alt="brand" />
									</td>
								</a>
							</tr>
							<tr>
								<td>
									<span class="brand-text">Parliament HR Management System</span>
								</td>
							</tr>
						</table>
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<div class="mb-20">
									<h4 class="text-center txt-dark">Sign In</h4>
									<!-- <h4 class="text-center txt-dark mb-10"><?= $this->session->flashdata('username'); ?></h4> -->
								</div>
								<div class="form-wrap">
									<form method="post">
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
											<input type="email" class="form-control" name="email" required="" id="exampleInputEmail_2" placeholder="Enter email">
										</div>
										<div class="form-group">
											<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
											<div class="clearfix"></div>
											<input type="password" class="form-control" name="pass" required="" id="exampleInputpwd_2" placeholder="Enter password">
										</div>

										<div class="row" style="padding-bottom: 2px;">
											<div class="col-xl-6 col-sm-6 col-xs-6">
												<div class="form-group">
													<div class=" checkbox checkbox-primary pr-10 pull-left" style="margin: auto;">
														<input id="checkbox_2" type="checkbox" required>
														<label for="checkbox_2"> Keep me logged in</label>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
											<div class="col-xl-6 col-sm-6 col-xs-6">
												<div class="form-group">
													<div class="checkbox checkbox-primary forgot-password-box">
														<a href="<?= base_url() ?>forgot_password" class="forgot-password-link">Forgot Password?</a>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>

										<div class="form-group text-center captcha-form-group">
											<p id="captImg"><?= $captchaImg; ?></p>
											<p class="captcha-text">Can't read the image? Click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p>
											<input type="text" name="captcha" value="" />
										</div>

										<div class="form-group text-center button-login-group">
											<button type="submit" class="btn btn-info btn-rounded">sign in</button>&nbsp;
											<button type="button" class="btn btn-info btn-rounded" onclick="window.location.href='<?= base_url(); ?>attendance'">ESS Attendance</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Row -->
		</div>

	</div>
	<!-- /Main Content -->

	</div>
	<!-- /#wrapper -->

	<!-- JavaScript -->

	<!-- jQuery -->
	<script src="<?= base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="<?= base_url(); ?>assets/dist/js/jquery.slimscroll.js"></script>

	<!-- Sweet-Alert  -->
	<script src="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Init JavaScript -->
	<script src="<?= base_url(); ?>assets/dist/js/init.js"></script>

	<!-- Custom Message Alert -->
	<script src="<?= base_url(); ?>assets/dist/js/message-alert.js"></script>

	<!-- Captcha Refresh Code -->
	<script>
		$(document).ready(function() {
			$('.refreshCaptcha').on('click', function() {
				$.get('<?= base_url() . 'login/refresh_captcha'; ?>', function(data) {
					$('#captImg').html(data);
				});
			});
		});
	</script>

</body>

</html>