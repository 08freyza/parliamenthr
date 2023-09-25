<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">

		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Education Setup</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="<?= base_url() . index_page(); ?>/educationsetup"><span>Education Setup</span></a></li>
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
							<h6 class="panel-title txt-dark">Education Setup</h6>
						</div>

						<div class="pull-right">
							<?php if (getCreateStatus($this->router->fetch_class()) == 'Y') echo anchor(site_url('educationsetup/create'), 'Create', 'class="btn btn-primary"'); ?> </div>
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
												<th>Level</th>
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
			// serverSide: true,
			ajax: {
				"url": "educationsetup/json",
				"type": "POST"
			},
			columns: [{
					"data": 0,
					"orderable": false
				}, {
					"data": 1
				},
				{
					"data": 2,
					"orderable": false,
					"className": "text-center",
					"width": "20%",
					"target": "0"
				}
			],
			// columns: [{
			// 		"data": "id",
			// 		"orderable": false
			// 	}, {
			// 		"data": "level"
			// 	},
			// 	{
			// 		"data": "action",
			// 		"orderable": false,
			// 		"className": "text-center",
			// 		"width": "20%",
			// 		"target": "0"
			// 	}
			// ],
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