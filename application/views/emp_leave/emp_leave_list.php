<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">

		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Employee Leave Approval</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="<?= base_url() . index_page(); ?>/emp_leave"><span>Employee Leave Approval</span></a></li>
					<li class="active"><span>List</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
		<!-- /Title -->

		<!-- Row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Employee Leave Approval List</h6>
						</div>

						<div class="pull-right"></div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="table-wrap">
								<div class="table-responsive">
									<table id="mytable" class="table table-hover table-bordered display mb-30">
										<thead>
											<tr>
												<th width="80px">No</th>
												<th>Emp No</th>
												<th>Leave Desc</th>
												<th>Start Date</th>
												<th>Total Day</th>
												<th>Status</th>
												<th>Leave Type</th>
												<th>Next Approval</th>
												<th width="200px">Action</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
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
	function doAction(act, id) {
		var textbody = '';

		swal({
			title: "Are you sure?",
			text: "Are you sure to " + act + " this request ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#f2b701",
			confirmButtonText: "Yes, " + act + " it!",
			cancelButtonText: "No, cancel it!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
				$.get('<?= base_url(); ?>emp_leave/doAction/' + act + '/' + id);
				setTimeout(function() {
					$('#mytable').DataTable().ajax.reload();
					setTimeout(function() {
						swal({
							title: "Success",
							text: "Leave request approved, successfully",
							type: "success"
						});
					}, 500);
				}, 1000);
			} else {
				swal("Cancelled", "Leave request failed to approved !", "error");
			}
		});
		return false;
	}

	$(document).ready(function() {
		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
			return {
				"iStart": oSettings._iDisplayStart,
				"iEnd": oSettings.fnDisplayEnd(),
				"iLength": oSettings._iDisplayLength,
				"iTotal": oSettings.fnRecordsTotal(),
				"iFilteredTotal": oSettings.fnRecordsDisplay(),
				"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
				"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
			};
		};

		var t = $("#mytable").dataTable({
			initComplete: function() {
				var api = this.api();
				$('#mytable_filter input')
					.off('.DT')
					.on('keyup.DT', function(e) {
						if (e.keyCode == 13) {
							api.search(this.value).draw();
						}
					});
			},
			oLanguage: {
				sProcessing: "loading..."
			},
			processing: true,
			serverSide: false,
			ajax: {
				"url": "emp_leave/json",
				"type": "POST"
			},
			columns: [{
					"data": 0,
					"orderable": false
				}, {
					"data": 1
				}, {
					"data": 2
				}, {
					"data": 3
				}, {
					"data": 4
				}, {
					"data": 5
				}, {
					"data": 6
				}, {
					"data": 7
				},
				{
					"data": 8,
					"orderable": false,
					"className": "text-center",
					"width": "20%",
					"target": "0"
				}
			],
			order: [
				[0, 'desc']
			],
			rowCallback: function(row, data, iDisplayIndex) {
				var info = this.fnPagingInfo();
				var page = info.iPage;
				var length = info.iLength;
				var index = page * length + (iDisplayIndex + 1);
				$('td:eq(0)', row).html(index);
			}
		});
	});
</script>