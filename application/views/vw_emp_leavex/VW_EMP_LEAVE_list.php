
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Vw_emp_leavex</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?=base_url();?>">Dashboard</a></li>
						<li><a href="<?=base_url().index_page();?>/vw_emp_leavex"><span>Vw_emp_leavex</span></a></li>
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
									<h6 class="panel-title txt-dark">Vw_emp_leavex</h6>
								</div>

								<div class="pull-right">
									<?php echo anchor(site_url('vw_emp_leavex/create'), 'Create', 'class="btn btn-primary"'); ?>
						<?php echo anchor(site_url('vw_emp_leavex/excel'), 'Excel', 'class="btn btn-primary"'); ?>					</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="mytable" class="table table-hover table-bordered display mb-30" >
												<thead>
													<tr>
														<th width="80px">No</th>
		    				<th>Id</th>
		    				<th>Emp No</th>
		    				<th>Leave Desc</th>
		    				<th>Sdate</th>
		    				<th>Edate</th>
		    				<th>Total Day</th>
		    				<th>Status</th>
		    				<th>Approve Date</th>
		    				<th>Leave Type</th>
		    				<th>Approve By</th>
		    				<th>Entry User</th>
		    				<th>Paidadvdate</th>
		    				<th>Curbalance</th>
		    				<th>Hours</th>
		    				<th>Is Paidadv</th>
		    				<th>Next Approval</th>
		    				<th>Spv Approved By</th>
		    				<th>Spv Approved Date</th>
		    				<th>Director Approved By</th>
		    				<th>Director Approved Date</th>											<th width="200px">Action</th>
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
						<p><?=footerSetup();?></p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
		<!-- /Main Content -->

	<script type="text/javascript">
		$(document).ready(function() {
			$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
			{
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
				serverSide: true,
				ajax: {"url": "vw_emp_leavex/json", "type": "POST"},
				columns: [
					{
						"data": "",
						"orderable": false
					},{"data": "id"},{"data": "emp_no"},{"data": "leave_desc"},{"data": "sdate"},{"data": "edate"},{"data": "total_day"},{"data": "status"},{"data": "approve_date"},{"data": "leave_type"},{"data": "approve_by"},{"data": "entry_user"},{"data": "paidadvdate"},{"data": "curbalance"},{"data": "hours"},{"data": "is_paidadv"},{"data": "next_approval"},{"data": "spv_approved_by"},{"data": "spv_approved_date"},{"data": "director_approved_by"},{"data": "director_approved_date"},
					{
						"data" : "action",
						"orderable": false,
						"className" : "text-center",
						"width":"20%",
						"target":"0"
					}
				],
				order: [[0, 'desc']],
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