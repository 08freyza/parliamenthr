	<!-- Custom CSS -->
	<link href="<?= base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">

	<!-- Main Content -->
	<div class="page-wrapper">
		<div class="container-fluid pt-25">
			<!-- Row -->
			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="panel panel-default card-view panel-refresh">
						<div class="refresh-container">
							<div class="la-anim-1"></div>
						</div>
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">&nbsp;</h6>
							</div>
							<div class="pull-right">
								<a href="#" class="pull-left inline-block refresh">
									<i class="zmdi zmdi-replay"></i>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div id="container"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="panel panel-default card-view panel-refresh">
						<div class="refresh-container">
							<div class="la-anim-1"></div>
						</div>
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">&nbsp;</h6>
							</div>
							<div class="pull-right">
								<a href="#" class="pull-left inline-block refresh">
									<i class="zmdi zmdi-replay"></i>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div id="container3"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="panel panel-default card-view panel-refresh">
						<div class="refresh-container">
							<div class="la-anim-1"></div>
						</div>
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">&nbsp;</h6>
							</div>
							<div class="pull-right">
								<a href="#" class="pull-left inline-block refresh">
									<i class="zmdi zmdi-replay"></i>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div id="container2"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="panel panel-default card-view panel-refresh">
						<div class="refresh-container">
							<div class="la-anim-1"></div>
						</div>
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">&nbsp;</h6>
							</div>
							<div class="pull-right">
								<a href="#" class="pull-left inline-block refresh">
									<i class="zmdi zmdi-replay"></i>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div id="container4"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="panel panel-default card-view panel-refresh">
						<div class="refresh-container">
							<div class="la-anim-1"></div>
						</div>
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">&nbsp;</h6>
							</div>
							<div class="pull-right">
								<a href="#" class="pull-left inline-block refresh">
									<i class="zmdi zmdi-replay"></i>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div id="container5"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Row -->
		</div>
		<!-- Footer -->
		<footer class="footer container-fluid pl-30 pr-30">
			<div class="row">
				<div class="col-sm-12">
					<p><?= date('Y'); ?> &copy; Vanuatu HR Government. Provided by CNS</p>
				</div>
			</div>
		</footer>
		<!-- /Footer -->

	</div>
	<!-- /Main Content -->

	<script type="text/javascript">
		$(function() {
			$('#container').highcharts({
				chart: {
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Employee Graph',
					x: -20
				},
				subtitle: {
					text: 'Based on Ages and Gender',
					x: -20
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				xAxis: {
					categories: ['< 20', '20 - 25', '25 - 30', '30 - 35', '35 - 40', '40 - 45', '45 - 50', '50 - 55', '> 50']
				},
				yAxis: {
					title: {
						text: 'People(s)'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					valueSuffix: ' people(s)'
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				series: [{
					name: 'Male',
					data: <?= getNumEmpBasedOnAgeAndGender('male'); ?>
				}, {
					name: 'Female',
					data: <?= getNumEmpBasedOnAgeAndGender('female'); ?>
				}]
			});
			$('#container2').highcharts({
				chart: {
					type: 'column',
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Department Graph',
					x: -20
				},
				subtitle: {
					text: 'Based on Department and Gender',
					x: -20
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				xAxis: {
					//categories: ['CNS', 'ECF', 'VST', 'ECFS', 'CNSS', 'NVT']
					categories: <?= getDepartmentNameOfEmp(); ?>
				},
				yAxis: {
					title: {
						text: 'People(s)'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: 'red'
					}]
				},
				tooltip: {
					valueSuffix: ' people(s)'
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				series: [{
					name: 'Male',
					data: <?= getNumEmpBasedOnDepartment('male'); ?>,
					color: 'green'
				}, {
					name: 'Female',
					data: <?= getNumEmpBasedOnDepartment('female'); ?>
				}]
			});
			$('#container3').highcharts({
				chart: {
					type: 'bar',
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Employee  Work History Graph',
					x: -20
				},
				subtitle: {
					text: 'Based on Ages and Gender',
					x: -20
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				xAxis: {
					categories: ['< 5', '6 - 10', '11 - 15', '16 - 20', '21 - 25', '26 - 30', '> 30']
				},
				yAxis: {
					title: {
						text: 'People(s)'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					valueSuffix: ' people(s)'
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				series: [{
					name: 'Male',
					data: <?= getNumEmpBasedOnWorkHistory('male'); ?>
				}, {
					name: 'Female',
					data: <?= getNumEmpBasedOnWorkHistory('female'); ?>
				}]
			});
			$('#container4').highcharts({
				chart: {
					type: 'pie',
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Ministry Graph',
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				tooltip: {
					valueSuffix: ' people(s)'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.y} people(s)',
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Employee Ministry',
					data: [<?= getNumEmpOnDepartment(); ?>]
				}]
			});
			$('#container5').highcharts({
				chart: {
					zoomType: 'xy',
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Average employee attandance current month'
				},
				subtitle: {
					text: 'Month December'
				},
				xAxis: [{
					categories: ["PSC", "VCH Allied Health", "VCH Surgical Ward", "VCH Maternity Ward", "VCH Paediatric Ward", ]
				}],
				yAxis: [{ // Primary yAxis
					labels: {
						format: '{value} Days',
						style: {
							color: Highcharts.getOptions().colors[1]
						}
					},
					title: {
						text: 'Day',
						style: {
							color: Highcharts.getOptions().colors[1]
						}
					}
				}],
				tooltip: {
					shared: true
				},
				legend: {
					layout: 'vertical',
					align: 'left',
					x: 120,
					verticalAlign: 'top',
					y: 100,
					floating: true,
					backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
				},
				series: [{
					name: 'Actual Working Days',
					type: 'column',
					data: [
						[0],
						[0],
						[0],
						[0],
						[0],
					],
					tooltip: {
						valueSuffix: ' Days'
					}

				}, {
					name: 'Total work Days ',
					type: 'spline',
					data: [
						[0],
						[0],
						[0],
						[0],
						[0],
					],
					tooltip: {
						valueSuffix: ' Days'
					}
				}]
			});
		});
	</script>