</div>
<!-- /#wrapper -->

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Moment JavaScript -->
<script type="text/javascript" src="<?= base_url(); ?>assets/vendors/bower_components/moment/min/moment-with-locales.min.js"></script>

<!-- Counter Animation JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Data table JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>

<script src="<?= base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/export-table-data.js"></script>

<script src="<?= base_url(); ?>assets/dist/js/productorders-data.js"></script>

<!-- Owl JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

<!-- Switchery JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/jquery.slimscroll.js"></script>

<!-- Fancy Dropdown JS -->
<script src="<?= base_url(); ?>assets/dist/js/dropdown-bootstrap-extended.js"></script>

<!-- Sparkline JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/morris.js/morris.min.js"></script>

<!-- Chartist JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/chartist-data.js"></script>

<!-- ChartJS JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>

<script src="<?= base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

<!-- Select2 JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- Bootstrap Datetimepicker JavaScript -->
<script type="text/javascript" src="<?= base_url(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- Bootstrap Daterangepicker JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Sweet-Alert  -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

<!-- highchart -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/highchart/highcharts.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/highchart/highcharts-more.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/highchart/modules/exporting.js"></script>

<!-- Init JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/init.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/dashboard3-data.js"></script>

<!-- Custom Message Alert -->
<script src="<?= base_url(); ?>assets/dist/js/message-alert.js"></script>

<script type="text/javascript">
	$(function() {
		$('.tanggal').datetimepicker({
			format: 'YYYY-MM-DD'
		}).on('dp.show', function() {
			if ($(this).data("DateTimePicker").date() === null)
				$(this).data("DateTimePicker").date(moment());
		});
		/*$('.waktux').datetimepicker({
    			format: 'LT',
    			useCurrent: false,
    			icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    },
    		}).data("DateTimePicker").date(moment());*/
		$('.waktu').datetimepicker({
			format: 'HH:mm'
		});
		$('.select2').select2();

		let notifCount = '<?= notification_counts($this->session->userdata('emp_no')); ?>'
		$('.message-nicescroll-bar').slimscroll({
			height: (Number(notifCount) < 4 ? (Number(notifCount) == 0 ? 58.55 : 58.55 * Number(notifCount)) : 233).toString() + 'px',
			size: '4px',
			color: '#878787',
			disableFadeOut: true,
			borderRadius: 0
		});
	});

	function confirmation(action, page, url, id) {
		var textbody = '';

		swal({
			title: "Are you sure?",
			text: "Are you sure to " + action.toUpperCase() + " this " + page + " data ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#f2b701",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel it!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
				$.get(url);
				setTimeout(function() {
					$('#mytable').DataTable().ajax.reload();
					setTimeout(function() {
						swal({
							title: "Success",
							text: "" + action.toUpperCase() + " " + page + ", Successfully",
							type: "success"
						});
					}, 500);
				}, 1000);
			} else {
				swal("Cancelled", "" + action.toUpperCase() + " " + page + "", "error");
			}
		});
		return false;
	}
</script>
</body>

</html>