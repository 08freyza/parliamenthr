<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Car Insurance System | CIS</title>
	<meta name="description" content="Car Insurance System | CIS." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, CIS Admin, CISadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>

	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="<?=base_url();?>assets/favicon.ico" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">

	<!-- Chartist CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

	<!-- Data table CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

	<!-- select2 CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>

	<!--alerts CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

	<!-- bootstrap-select CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

	<!-- bootstrap-tagsinput CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-touchspin CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- multi-select CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Switches CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Datetimepicker CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>

	<!-- Bootstrap Daterangepicker CSS -->
	<link href="<?=base_url();?>assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>

	<!-- Morris Charts CSS -->
    <link href="<?=base_url();?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- vector map CSS -->
	<link href="<?=base_url();?>assets/vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>

	<!-- Custom CSS -->
	<link href="<?=base_url();?>assets/dist/css/style.css" rel="stylesheet" type="text/css">

	<style>
		.dataTables_wrapper {
			min-height: 280px
		}

		.dataTables_processing {
			position: absolute;
			top: 10%;
			left: 50%;
			width: 100%;
			margin-left: -50%;
			margin-top: -25px;
			padding-top: 20px;
			text-align: center;
			font-size: 1.2em;
			color:grey;
		}
		.form-control[disabled] {
			background-color: rgb(33, 33, 33);
		}
	</style>
	<!-- JavaScript -->

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Moment JavaScript -->
	<script type="text/javascript" src="<?=base_url();?>assets/vendors/bower_components/moment/min/moment-with-locales.min.js"></script>

	<!-- Counter Animation JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?=base_url();?>assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>

	<!-- Data table JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url();?>assets/dist/js/productorders-data.js"></script>

	<script src="<?=base_url();?>assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?=base_url();?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="<?=base_url();?>assets/vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="<?=base_url();?>assets/vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="<?=base_url();?>assets/vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>

	<script src="<?=base_url();?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="<?=base_url();?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="<?=base_url();?>assets/dist/js/export-table-data.js"></script>

	<!-- Owl JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>

	<!-- Select2 JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

	<!-- Bootstrap Select JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<!-- Bootstrap Tagsinput JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	
	<!-- Bootstrap Touchspin JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	
	<!-- Multiselect JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>

	<!-- Bootstrap Switch JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>

	<!-- Bootstrap Datetimepicker JavaScript -->
	<script type="text/javascript" src="<?=base_url();?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Sweet-Alert  -->
	<script src="<?=base_url();?>assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Bootstrap Daterangepicker JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="<?=base_url();?>assets/dist/js/jquery.slimscroll.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="<?=base_url();?>assets/dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Sparkline JavaScript -->
	<script src="<?=base_url();?>assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

	<!-- Morris Charts JavaScript -->
    <script src="<?=base_url();?>assets/vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/bower_components/morris.js/morris.min.js"></script>
	<!-- Chartist JavaScript -->
	<script src="<?=base_url();?>assets/vendors/bower_components/chartist/dist/chartist.min.js"></script>
	<script src="<?=base_url();?>assets/dist/js/chartist-data.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="<?=base_url();?>assets/vendors/chart.js/Chart.min.js"></script>
	<?php if ($this->router->fetch_class()=='dashboard') { echo "<script src=\"".base_url()."assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js\"></script>"; } ?> 

	<script type="text/javascript">
		$(function(){
			$('.date').datetimepicker({
				format: 'YYYY-MM-DD',
				sideBySide: true
			});
		});

		function confirmation(action,page,url,id)
		{
			var textbody = '';

			swal({   
				title: "Are you sure?",
				text: "Are you sure to "+action.toUpperCase()+" this "+page+" data ?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#f2b701",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel it!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm){
				if (isConfirm) {
					$.get(url);
					setTimeout(function(){
						$('#mytable').DataTable().ajax.reload();
						setTimeout(function(){
							swal({title: "Success", text: ""+action.toUpperCase()+" "+page+", Successfully", type: "success"});
						},500);
					},1000);
				} else {
					swal("Cancelled", ""+action.toUpperCase()+" "+page+"", "error");
				}
			});
			return false;
		}
	</script>


</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-4-active pimary-color-red box-layout">

        <!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="<?=base_url();?>">
							<img class="brand-img" src="<?=base_url();?>assets/dist/img/logo.png" alt="brand"/>
							<span class="brand-text">CIS</span>
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
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown alert-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
						<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
							<li>
								<div class="notification-box-head-wrap">
									<span class="notification-box-head pull-left inline-block">notifications</span>
									<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
									<div class="clearfix"></div>
									<hr class="light-grey-hr ma-0"/>
								</div>
							</li>
							<li>
								<div class="streamline message-nicescroll-bar">
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-green">
												<i class="zmdi zmdi-flag"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">
												New subscription created</span>
												<span class="inline-block font-11  pull-right notifications-time">2pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
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
								</div>
							</li>
							<li>
								<div class="notification-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> read all </a>
									<div class="clearfix"></div>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?=base_url();?>assets/dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="<?=base_url();?>index.php/profile"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							<li>
								<a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?=base_url();?>index.php/login/out"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->