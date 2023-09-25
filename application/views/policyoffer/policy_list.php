
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="row heading-bg" style="margin-bottom: 10px">
					<div class="col-md-4">
						<h2 style="margin-top:0px">Policy Offered</h2>
					</div>
					<div class="col-md-4 text-center">
						<div style="margin-top: 4px"  id="message">
							<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
						</div>
					</div>
				</div>
				<table class="table table-bordered table-striped" id="mytable">
					<thead>
						<tr>
							<th width="80px">No</th>
		    				<th>Category</th>
		    				<th>Sub Category</th>
		    				<th>Policy Name</th>
		    				<th>Sum Assured</th>
		    				<th>Premium</th>
		    				<th>Tenure</th>
		    				<th>Status</th>
		    				<th width="200px">Action</th>
							</tr>
						</thead>
	
				</table>
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
    </div>
	<script src="<?=base_url();?>assets/js/jquery-1.11.2.min.js"></script>
	<script src="<?=base_url();?>assets/datatables/jquery.dataTables.js"></script>
	<script src="<?=base_url();?>assets/datatables/dataTables.bootstrap.js"></script>
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
				paging:   false,
				serverSide: true,
				ajax: {"url": "policyoffer/json", "type": "POST"},
				columns: [
					{
						"data": "id",
						"orderable": false
					},{"data": "id_cat"},{"data": "id_subcat"},{"data": "policy_name"},{"data": "sum_assured"},{"data": "premium"},{"data": "tenure"},{
						"data": "status",
						"render": function(data,type,row){
							return data == 1 ? "Active":"Not Active"
						}
					},
					{
						"data" : "applied",
						"orderable": false,
						"className" : "text-center",
						"render": function(data,type,row){
							return (data==1 ? '<button class="btn btn-success">&nbsp;<i class="fa fa-pencil-square-o"></i><span class="btn-text">Applied</span></button>' : '<button class="btn btn-danger btn-anim" onclick="window.location.href=\'<?=base_url();?>index.php/policyoffer/apply/'+row.id+'\'"><i class="fa fa-pencil-square-o"></i><span class="btn-text">Apply</span></button>');
						}
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