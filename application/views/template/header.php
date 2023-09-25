<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Parliament HR Management System</title>
	<meta name="description" content="Magilla is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Magilla Admin, Magillaadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/favicon.ico">
	<link rel="icon" href="<?= base_url(); ?>assets/favicon.ico" type="image/x-icon">

	<!-- Morris Charts CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css" />

	<!-- vector map CSS -->
	<link href="<?= base_url(); ?>assets/vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css" />

	<!--alerts CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

	<!-- Data table CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

	<!-- Chartist CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />

	<link href="<?= base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

	<!-- select2 CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

	<!-- Bootstrap Datetimepicker CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />

	<!-- Bootstrap Daterangepicker CSS -->
	<link href="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

	<!-- Custom CSS -->
	<link href="<?= base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">

	<!-- JavaScript -->

	<!-- jQuery -->
	<script src="<?= base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
	<div class="wrapper theme-1-active pimary-color-green">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="">
						<a href="<?= base_url(); ?>dashboard">
							<img class="" src="<?= base_url(); ?>assets/dist/img/logo-3.png" width="61" height="63" alt="brand" />
							<!-- remark this 
		<span class="brand-text">Vanuatu HRMIS</span>
		-->
						</a>
					</div>
				</div>
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
							<button type="button" class="btn  btn-default" data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown alert-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="zmdi zmdi-notifications top-nav-icon"></i>
							<?php if (notification_counts($this->session->userdata('emp_no')) != 0) : ?>
								<span class="top-nav-icon-badge">
									<?= notification_counts($this->session->userdata('emp_no')) ?>
								</span>
							<?php endif; ?>
						</a>
						<ul class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
							<li>
								<div class="notification-box-head-wrap">
									<span class="notification-box-head pull-left inline-block">notifications</span>
									<?php if (notification_counts($this->session->userdata('emp_no')) != 0) : ?>
										<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
									<?php endif; ?>
									<div class="clearfix"></div>
									<hr class="light-grey-hr ma-0" />
								</div>
							</li>
							<li>
								<div class="streamline message-nicescroll-bar">
									<?php if (notification_counts($this->session->userdata('emp_no')) != 0) : ?>
										<?php foreach (notification($this->session->userdata('emp_no')) as $each_notification) : ?>
											<div class="sl-item">
												<a href="javascript:void(0)">
													<div class="icon bg-green">
														<i class="zmdi zmdi-flag"></i>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font pull-left truncate head-notifications">
															You have a notification
														</span>
														<span class="inline-block font-11  pull-right notifications-time"><?= $each_notification['notification_date']; ?></span>
														<div class="clearfix"></div>
														<p class="truncate"><?= $each_notification['message']; ?></p>
													</div>
												</a>
											</div>
											<hr class="light-grey-hr ma-0" />
										<?php endforeach; ?>
									<?php else : ?>
										<div class="sl-item" style="padding-top: 16.775px; padding-bottom: 16.775px;">
											<!-- <a href="javascript:void(0)">
												<div class="icon bg-green">
													<i class="zmdi zmdi-flag"></i>
												</div>
												<div class="sl-content">
													<span class="inline-block capitalize-font pull-left truncate head-notifications">
														You have a notification
													</span>
													<span class="inline-block font-11  pull-right notifications-time">Test</span>
													<div class="clearfix"></div>
													<p class="truncate">Test</p>
												</div>
											</a> -->
											<!-- <a class="block text-center read-all" href="javascript:void(0)"> read all </a>
											<div class="clearfix"></div> -->
											<!-- <div style="height:233px; text-align: center;">
												<p>No Notification</p>
											</div> -->
											<p style="text-align: center;">No Notification</p>
										</div>
										<!-- <hr class="light-grey-hr ma-0" /> -->
									<?php endif; ?>
									<!-- <div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-yellow">
												<i class="zmdi zmdi-trending-down"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>
												<span class="inline-block font-11 pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Some technical error occurred needs to be resolved.</p>
											</div>
										</a>
									</div>
									<hr class="light-grey-hr ma-0" />
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-blue">
												<i class="zmdi zmdi-email"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>
												<span class="inline-block font-11  pull-right notifications-time">4pm</span>
												<div class="clearfix"></div>
												<p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>
											</div>
										</a>
									</div>
									<hr class="light-grey-hr ma-0" />
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="sl-avatar">
												<img class="img-responsive" src="<?= base_url(); ?>assets/dist/img/avatar.jpg" alt="avatar" />
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>
												<span class="inline-block font-11  pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
											</div>
										</a>
									</div>
									<hr class="light-grey-hr ma-0" />
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-red">
												<i class="zmdi zmdi-storage"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>
												<span class="inline-block font-11  pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">consectetur, adipisci velit.</p>
											</div>
										</a>
									</div> -->
								</div>
							</li>
							<li>
								<?php if (notification_counts($this->session->userdata('emp_no')) != 0) : ?>
									<div class="notification-box-bottom-wrap">
										<hr class="light-grey-hr ma-0" />
										<a class="block text-center read-all" href="javascript:void(0)"> read all </a>
										<div class="clearfix"></div>
									</div>
								<?php endif; ?>
							</li>
						</ul>
					</li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?= base_url(); ?>assets/dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle" /><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="<?= base_url(); ?>emp_personal"><i class="zmdi zmdi-account"></i><span><?= $this->session->userdata('emp_no'); ?></span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?= base_url(); ?>login/out"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /Top Menu Items -->