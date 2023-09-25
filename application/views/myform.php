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
								<div align="center"><button class="btn btn-primary btnTime"><?= $param; ?> Time</button></div>
								<form name="frmAtt" method="post"><input id="param" type="hidden" name="param" value="<?= $param; ?>" /><input id="id" type="hidden" name="id" value="<?= $id; ?>" /><input id="tgl" type="hidden" name="tgl" value="<?= date('Y-m-d'); ?>" /><input id="wkt" type="hidden" name="wkt" value="<?= date('H:i:s'); ?>" /></form>
								<div class="hour" style="display:none;"></div>
								<div class="minute" style="display:none;"></div>
								<div class="second" style="display:none;"></div>
								<div id="container"></div>
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
		<div class="dialog"></div>
	</div>
	<!-- /Main Content -->

	<script type="text/javascript">
		$(function() {
			$('.btnTime').click(function() {
				$.post('../myform/checkabsennow', {
					tgl: '<?= date('Y-m-d'); ?>'
				}, function(data) {
					if (data != '') {
						swal({
							title: "Warning",
							text: data,
							type: "warning"
						});
					} else {
						swal({
							title: "Are you sure?",
							text: "<?= ucfirst($param); ?> the time ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonColor: "#f2b701",
							confirmButtonText: "Yes, start it!",
							cancelButtonText: "No, cancel it!",
							closeOnConfirm: false,
							closeOnCancel: false
						}, function(isConfirm) {
							if (isConfirm) {
								setTimeout(function() {
									var param = '<?= $param; ?>';
									var id = $('#id').val();
									var tgl = $('#tgl').val();
									var wkt = $('#wkt').val();
									$.post('<?= base_url(); ?>myform/submit', {
										param: param,
										id: id,
										tgl: tgl,
										wkt: wkt
									}, function(data) {
										setTimeout(function() {
											swal({
												title: "Success",
												text: "You are successfully clocked <?= ($param == 'start' ? 'in' : 'out'); ?>",
												type: "success"
											});
											setTimeout(function() {
												window.location.href = "<?= base_url(); ?>myform";
											}, 3000);
										}, 500);
									});
								}, 1000);
							} else {
								swal("Cancelled", "Request has been cancelled !", "error");
							}
						});
					}
				});
			});

			function getNow() {
				var now = new Date();
				return {
					hours: now.getHours() + now.getMinutes() / 60,
					minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
					seconds: now.getSeconds() * 12 / 60
				};
			};

			function getNow2() {
				$.post('../attendance/gethour', {
					'': ''
				}, function(data) {
					var now;
					now = data.split(':');
					return {
						hours: now[0],
						minutes: now[1],
						seconds: now[2]
					};
				});
			};

			function pad(number, length) {
				return new Array((length || 2) + 1 - String(number).length).join(0) + number;
			}
			var now = getNow();

			$('#container').highcharts({
					chart: {
						type: 'gauge',
						plotBackgroundColor: null,
						plotBackgroundImage: null,
						plotBorderWidth: 0,
						plotShadow: false,
						height: 300
					},
					title: {
						text: ''
					},
					exporting: {
						enabled: false
					},
					credits: {
						enabled: false
					},
					pane: {
						background: [{
							backgroundColor: Highcharts.svg ? {
								radialGradient: {
									cx: 0.5,
									cy: -0.4,
									r: 1.9
								},
								stops: [
									[0.5, 'rgba(255, 255, 255, 0.2)'],
									[0.5, 'rgba(200, 200, 200, 0.2)']
								]
							} : null
						}]
					},

					yAxis: {
						labels: {
							distance: -20
						},
						min: 0,
						max: 12,
						lineWidth: 0,
						showFirstLabel: false,

						minorTickInterval: 'auto',
						minorTickWidth: 1,
						minorTickLength: 5,
						minorTickPosition: 'inside',
						minorGridLineWidth: 0,
						minorTickColor: '#666',

						tickInterval: 1,
						tickWidth: 2,
						tickPosition: 'inside',
						tickLength: 10,
						tickColor: '#666',
						title: {
							style: {
								color: '#BBB',
								fontWeight: 'normal',
								fontSize: '8px',
								lineHeight: '10px'
							},
							y: 10
						}
					},
					tooltip: {
						formatter: function() {
							return this.series.chart.tooltipText;
						}
					},
					series: [{
						data: [{
							id: 'hour',
							y: now.hours,
							dial: {
								radius: '60%',
								baseWidth: 4,
								baseLength: '95%',
								rearLength: 0
							}
						}, {
							id: 'minute',
							y: now.minutes,
							dial: {
								baseLength: '95%',
								rearLength: 0
							}
						}, {
							id: 'second',
							y: now.seconds,
							dial: {
								radius: '100%',
								baseWidth: 1,
								rearLength: '20%'
							}
						}],
						animation: false,
						dataLabels: {
							enabled: false
						}
					}]
				},
				function(chart) {
					setInterval(function() {
						var hour = chart.get('hour'),
							minute = chart.get('minute'),
							second = chart.get('second'),
							now = getNow(),
							animation = now.seconds == 0 ?
							false : {
								easing: 'easeOutElastic'
							};

						chart.tooltipText =
							pad(Math.floor(now.hours), 2) + ':' +
							pad(Math.floor(now.minutes * 5), 2) + ':' +
							pad(now.seconds * 5, 2);


						hour.update(now.hours, true, animation);
						minute.update(now.minutes, true, animation);
						second.update(now.seconds, true, animation);
					}, 1000);
				});
		});

		$.extend($.easing, {
			easeOutElastic: function(x, t, b, c, d) {
				var s = 1.70158;
				var p = 0;
				var a = c;
				if (t == 0) return b;
				if ((t /= d) == 1) return b + c;
				if (!p) p = d * .3;
				if (a < Math.abs(c)) {
					a = c;
					var s = p / 4;
				} else var s = p / (2 * Math.PI) * Math.asin(c / a);
				return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
			}
		});
	</script>