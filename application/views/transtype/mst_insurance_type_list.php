
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="row heading-bg" style="margin-bottom: 10px">
					<div class="col-md-4">
						<h2 style="margin-top:0px">Insurance Type List</h2>
					</div>
					<div class="col-md-4 text-center">
						<div style="margin-top: 4px"  id="message">
							<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
						</div>
					</div>
					<div class="col-md-4 text-right">
						<?php echo anchor(site_url('transtype/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    			</div>
				</div>
				<table class="table table-bordered table-striped" id="mytable">
					<thead>
						<tr>
							<th width="80px">No</th>
		    				<th>Desc</th>
							<th>Active</th>
		    				<th width="200px">Action</th>
							</tr>
						</thead>
	
				</table>
			</div>
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
				serverSide: true,
				ajax: {"url": "transtype/json", "type": "POST"},
				columns: [
					{
						"data": "ID",
						"orderable": false
					},{"data": "desc"},{
						"data":"active",
						"render": function(data,type,row){
							return data == 1 ? 'Active': 'Not Active'
						}
					},
					{
						"data" : "action",
						"orderable": false,
						"className" : "text-center"
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