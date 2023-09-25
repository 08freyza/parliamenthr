	<!-- Custom CSS -->
	<link href="<?= base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">

	<!-- Main Content -->
	<div class="page-wrapper">
		<div class="container-fluid pt-25">
			<!-- Row -->
			<div class="row">

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
								<div class="row">
									<div class="pull-left" id="container"></div>
									<div class="pull-left">&nbsp;</div>
									<div class="pull-left" id="container2"></div>
									<div class="pull-left">&nbsp;</div>
									<div class="pull-left" id="container3"></div>
								</div>
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
								<div id="container6"></div>
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
					<p><?= footerSetup(); ?></p>
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
					type: 'gauge',
					plotBackgroundColor: null,
					plotBackgroundImage: null,
					plotBorderWidth: 0,
					plotShadow: false,
					width: 300,
					height: 300,
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Total Employee'
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				pane: {
					startAngle: -150,
					endAngle: 150,
					background: [{
						backgroundColor: {
							linearGradient: {
								x1: 0,
								y1: 0,
								x2: 0,
								y2: 1
							},
							stops: [
								[0, '#FFF'],
								[1, '#9AF']
							]
						},
						borderWidth: 0,
						outerRadius: '109%'
					}, {
						backgroundColor: {
							linearGradient: {
								x1: 0,
								y1: 0,
								x2: 0,
								y2: 1
							},
							stops: [
								[0, '#9AF'],
								[1, '#FFF']
							]
						},
						borderWidth: 1,
						outerRadius: '107%'
					}, {
						backgroundColor: '#fff',
						borderWidth: 0,
						outerRadius: '105%',
						innerRadius: '103%'
					}]
				},

				yAxis: {
					min: 0,
					max: 1000,

					minorTickInterval: 'auto',
					minorTickWidth: 1,
					minorTickLength: 1,
					minorTickPosition: 'inside',
					minorTickColor: '#666',

					tickPixelInterval: 30,
					tickWidth: 1,
					tickPosition: 'inside',
					tickLength: 1,
					tickColor: '#666',
					labels: {
						step: 2,
						rotation: 'auto'
					},
					title: {
						text: 'Total<br/><b><?= totalEmp(); ?> Employee</b>'
					},
					plotBands: [{
						from: 0,
						to: 500,
						color: '#00AAEE'
					}]
				},
				series: [{
					name: 'Total Employee',
					data: [<?= totalEmp(); ?>],
					tooltip: {
						valueSuffix: ' Employee'
					}
				}]
			});

			$('#container2').highcharts({
				chart: {
					type: 'gauge',
					plotBackgroundColor: null,
					plotBackgroundImage: null,
					plotBorderWidth: 0,
					plotShadow: false,
					width: 300,
					height: 300,
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Employee Gender'
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				pane: {
					startAngle: -150,
					endAngle: 150,
					background: [{
						backgroundColor: {
							linearGradient: {
								x1: 0,
								y1: 0,
								x2: 0,
								y2: 1
							},
							stops: [
								[0, '#FFF'],
								[1, '#9AF']
							]
						},
						borderWidth: 0,
						outerRadius: '109%'
					}, {
						backgroundColor: {
							linearGradient: {
								x1: 0,
								y1: 0,
								x2: 0,
								y2: 1
							},
							stops: [
								[0, '#9AF'],
								[1, '#FFF']
							]
						},
						borderWidth: 1,
						outerRadius: '107%'
					}, {
						backgroundColor: '#fff',
						borderWidth: 0,
						outerRadius: '105%',
						innerRadius: '103%'
					}]
				},

				yAxis: {
					min: 0,
					max: <?= totalEmp(); ?>,

					minorTickInterval: 'auto',
					minorTickWidth: 1,
					minorTickLength: 1,
					minorTickPosition: 'inside',
					minorTickColor: '#666',

					tickPixelInterval: 30,
					tickWidth: 1,
					tickPosition: 'inside',
					tickLength: 1,
					tickColor: '#666',
					labels: {
						step: 2,
						rotation: 'auto'
					},
					title: {
						text: 'Total Male:<br/><b><?= empGender('male'); ?> people(s)</b>'
					},
					plotBands: [{
						from: 0,
						to: 500,
						color: '#00AAEE'
					}]
				},
				series: [{
					name: 'Total Male',
					data: [<?= empGender('male'); ?>],
					tooltip: {
						valueSuffix: ' people(s)'
					}
				}]
			});

			$('#container3').highcharts({
				chart: {
					type: 'gauge',
					plotBackgroundColor: null,
					plotBackgroundImage: null,
					plotBorderWidth: 0,
					plotShadow: false,
					width: 300,
					height: 300,
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Employee Gender'
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				pane: {
					startAngle: -150,
					endAngle: 150,
					background: [{
						backgroundColor: {
							linearGradient: {
								x1: 0,
								y1: 0,
								x2: 0,
								y2: 1
							},
							stops: [
								[0, '#FFF'],
								[1, '#9AF']
							]
						},
						borderWidth: 0,
						outerRadius: '109%'
					}, {
						backgroundColor: {
							linearGradient: {
								x1: 0,
								y1: 0,
								x2: 0,
								y2: 1
							},
							stops: [
								[0, '#9AF'],
								[1, '#FFF']
							]
						},
						borderWidth: 1,
						outerRadius: '107%'
					}, {
						backgroundColor: '#fff',
						borderWidth: 0,
						outerRadius: '105%',
						innerRadius: '103%'
					}]
				},

				yAxis: {
					min: 0,
					max: <?= totalEmp(); ?>,

					minorTickInterval: 'auto',
					minorTickWidth: 1,
					minorTickLength: 1,
					minorTickPosition: 'inside',
					minorTickColor: '#666',

					tickPixelInterval: 30,
					tickWidth: 1,
					tickPosition: 'inside',
					tickLength: 1,
					tickColor: '#666',
					labels: {
						step: 2,
						rotation: 'auto'
					},
					title: {
						text: 'Total Female: <br/><b><?= empGender('female'); ?> people(s)</b>'
					},
					plotBands: [{
						from: 0,
						to: 500,
						color: '#00AAEE'
					}]
				},
				series: [{
					name: 'Total Female',
					data: [<?= empGender('female'); ?>],
					tooltip: {
						valueSuffix: ' people(s)'
					}
				}]
			});

			$('#container4').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					width: 500,
					height: 500,
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Employee Status'
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.y} people(s)</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.y} people(s)',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Employee Status',
					data: [<?= getEmpStatus(); ?>]
				}]
			});
			$('#container5').highcharts({
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
			$('#container6').highcharts({
				chart: {
					type: 'column',
					backgroundColor: 'rgba(255, 255, 255, 0.1)'
				},
				title: {
					text: 'Employee Status Graph',
					x: -20
				},
				subtitle: {
					text: 'Based on employee status due date',
					x: -20
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: true
				},
				xAxis: {
					//categories: ['CNS', 'ECF', 'VST', 'ECFS', 'CNSS', 'NVT']
					categories: [<?= getStatus(); ?>]
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
				plotOptions: {
					series: {
						cursor: 'pointer',
						point: {
							events: {
								click: function() {
									//alert(this.series.options.id);
									//alert(this.x);
									//window.open(https://hr.government.cns.com.vu/, '_blank'); 
									window.open('https://hr.government.cns.com.vu/demograph/statuslist/' + containerstatus[this.x] + '/' + this.series.options.id, 'StatusGraph', 'width=1200, height=600');

								}
							}
						}
					}
				},
				series: [{
					name: '1 month to due',
					data: [<?= getEmpCareerStatus(1); ?>],
					id: 1,
					color: 'orange'
				}, {
					name: '1 month due',
					data: [<?= getEmpCareerStatus(1); ?>],
					id: 2,
					color: 'red'
				}, {
					name: 'more than 1 month due',
					data: [<?= getEmpCareerStatus(1); ?>],
					id: 3,
					color: 'black'
				}]
			});

		});
	</script>