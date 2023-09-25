
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Emp_detail</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?=base_url();?>">Dashboard</a></li>
						<li><a href="<?=base_url().index_page();?>/emp_detail"><span>Emp_detail</span></a></li>
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
									<h6 class="panel-title txt-dark">Emp_detail</h6>
								</div>

								<div class="pull-right">
									<?php echo anchor(site_url('emp_detail/create'), 'Create', 'class="btn btn-primary"'); ?>					</div>
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
		    				<th>Emp No</th>
		    				<th>Emp Name</th>
		    				<th>Login Id</th>
		    				<th>Account No</th>
		    				<th>Official Name</th>
		    				<th>Active Status</th>
		    				<th>Emp Status</th>
		    				<th>Gender</th>
		    				<th>Marital Status</th>
		    				<th>Birthday</th>
		    				<th>Place Birthday</th>
		    				<th>Joindate</th>
		    				<th>Eoc</th>
		    				<th>Religion</th>
		    				<th>Location</th>
		    				<th>Unit</th>
		    				<th>Title</th>
		    				<th>Grade</th>
		    				<th>Bank Name</th>
		    				<th>Blood Type</th>
		    				<th>Hospitalized</th>
		    				<th>Medicalcond</th>
		    				<th>Shoes</th>
		    				<th>Medicaltestnotes</th>
		    				<th>Pants</th>
		    				<th>Medtest</th>
		    				<th>Cloth</th>
		    				<th>Weight</th>
		    				<th>Headsize</th>
		    				<th>Height</th>
		    				<th>Vnpf</th>
		    				<th>Address</th>
		    				<th>Mobile Phone</th>
		    				<th>Home Phone</th>
		    				<th>Email</th>
		    				<th>Department</th>
		    				<th>Ministry</th>
		    				<th>Division</th>
		    				<th>Is Vnpf</th>
		    				<th>Is Emp</th>
		    				<th>Bankid</th>
		    				<th>Keen</th>
		    				<th>Keendate</th>
		    				<th>Fingerid</th>											<th width="200px">Action</th>
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
				ajax: {"url": "emp_detail/json", "type": "POST"},
				columns: [
					{
						"data": "id",
						"orderable": false
					},{"data": "emp_no"},{"data": "emp_name"},{"data": "login_id"},{"data": "account_no"},{"data": "official_name"},{"data": "active_status"},{"data": "emp_status"},{"data": "gender"},{"data": "marital_status"},{"data": "birthday"},{"data": "place_birthday"},{"data": "joindate"},{"data": "eoc"},{"data": "religion"},{"data": "location"},{"data": "unit"},{"data": "title"},{"data": "grade"},{"data": "bank_name"},{"data": "blood_type"},{"data": "hospitalized"},{"data": "medicalcond"},{"data": "shoes"},{"data": "medicaltestnotes"},{"data": "pants"},{"data": "medtest"},{"data": "cloth"},{"data": "weight"},{"data": "headsize"},{"data": "height"},{"data": "vnpf"},{"data": "address"},{"data": "mobile_phone"},{"data": "home_phone"},{"data": "email"},{"data": "department"},{"data": "ministry"},{"data": "division"},{"data": "is_vnpf"},{"data": "is_emp"},{"data": "bankid"},{"data": "keen"},{"data": "keendate"},{"data": "fingerid"},
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