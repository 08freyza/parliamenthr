
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Client</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?=base_url();?>">Dashboard</a></li>
						<li><a href="<?=base_url().index_page();?>/client"><span>Client</span></a></li>
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
									<h6 class="panel-title txt-dark">Client</h6>
								</div>

								<div class="pull-right">
									<?php echo anchor(site_url('client/create'), 'Create', 'class="btn btn-primary"'); ?>
						<?php echo anchor(site_url('client/excel'), 'Excel', 'class="btn btn-primary"'); ?>					</div>
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
		    				<th>Number</th>
		    				<th>Type</th>
		    				<th>Name</th>
		    				<th>Dob</th>
		    				<th>Gender</th>
		    				<th>Mobile</th>
		    				<th>Email</th>
		    				<th>Address</th>
		    				<th>City</th>
		    				<th>Nation</th>
		    				<th>State</th>
		    				<th>Photo</th>
		    				<th>Num Of Payment</th>
		    				<th>Init Amount</th>
		    				<th>Transdate</th>
		    				<th>Password</th>											<th width="200px">Action</th>
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
				ajax: {"url": "client/json", "type": "POST"},
				columns: [
					{
						"data": "ID",
						"orderable": false
					},{"data": "number"},{"data": "type"},{"data": "name"},{"data": "dob"},{"data": "gender"},{"data": "mobile"},{"data": "email"},{"data": "address"},{"data": "city"},{"data": "nation"},{"data": "state"},{"data": "photo"},{"data": "num_of_payment"},{"data": "init_amount"},{"data": "transdate"},{"data": "password"},
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