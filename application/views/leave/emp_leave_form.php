<?php $id = $this->uri->segment(3); ?>
<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Employee Leave</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Employee Leave</span></a></li>
					<li class="active"><span>Form</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
		<!-- /Title -->

		<!-- Row -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Employee Leave Form</h6>
						</div>
						<?php if ($button != "Create") { ?>
							<div class="pull-right">
								<button class="btn btn-primary printPdf" onClick="showPrint();">Print</button>
							</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="form-wrap">
										<form action="<?php echo $action; ?>" method="post">
											<div class="form-group">
												<label for="varchar">Employee Name <?php echo form_error('emp_no') ?></label>
												<?= cboEmpNo('emp_no', $emp_no, ($button == 'Read' || getLeaveStatus($id) == 2 ? 'disabled=disabled' : '')); ?>
											</div>
											<div value="<?= $emp_no ?>"></div>
											<div class="form-group">
												<label for="int">Leave Type <?php echo form_error('leave_type') ?></label>
												<?= cboLeaveType('leave_type', $leave_type, ($button == 'Read' || getLeaveStatus($id) == 2 ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="float">Curbalance <?php echo form_error('curbalance') ?></label>
												<input type="text" class="form-control" name="curbalance" id="curbalance" placeholder="Curbalance" Readonly <?php if ($button == 'Read' || getLeaveStatus($id) == 2) echo 'disabled=disabled'; ?> value="<?php echo $curbalance; ?>" />
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="date">Leave Date From <?php echo form_error('sdate') ?></label>
													<input type="text" class="form-control date tanggal" name="sdate" id="sdate" placeholder="Leave Date From" <?php if ($button == 'Read' || getLeaveStatus($id) == 2) echo 'disabled=disabled'; ?> value="<?php echo $sdate; ?>" />
												</div>
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="date">Leave Date To <?php echo form_error('edate') ?></label>
													<input type="text" class="form-control date tanggal" name="edate" id="edate" placeholder="Leave Date To" <?php if ($button == 'Read' || getLeaveStatus($id) == 2) echo 'disabled=disabled'; ?> value="<?php echo $edate; ?>" />
												</div>
											</div>
									</div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="form-wrap">
										<div class="form-group">
											<label for="int">Total Day <?php echo form_error('total_day') ?></label>
											<input type="text" class="form-control" name="total_day" id="total_day" placeholder="Total Day" Readonly <?php if ($button == 'Read'  || getLeaveStatus($id) == 2) echo 'disabled=disabled'; ?> value="<?php echo $total_day; ?>" />
										</div>
										<div class="form-group">
											<label for="double">Hours <?php echo form_error('hours') ?></label>
											<input type="text" class="form-control" name="hours" id="hours" placeholder="Hours" Readonly <?php if ($button == 'Read'  || getLeaveStatus($id) == 2) echo 'disabled=disabled'; ?> value="<?php echo $hours; ?>" />
										</div>
										<div class="form-group">
											<label for="leave_desc">Leave Desc <?php echo form_error('leave_desc') ?></label>
											<textarea class="form-control" rows="3" name="leave_desc" id="leave_desc" placeholder="Leave Desc" <?php if ($button == 'Read'  || getLeaveStatus($id) == 2) echo 'disabled=disabled'; ?>><?php echo $leave_desc; ?></textarea>
										</div>
										<div class="form-group">
											<div class='input-group col-sm-12 col-xs-12'>
												<label for="varchar">Advance Salary <?php echo form_error('is_advsalary') ?></label>
												<div class="form-check">
													<label class="form-check-label">
														<input type="radio" class="form-check-input" name="is_advsalary" <?php if ($button == 'Read'  || getLeaveStatus($id) == 2) echo 'disabled=disabled'; ?> <?= (strtolower($is_advsalary) == 'y') ? 'checked' : '' ?> value="<?php echo $is_advsalary; ?>"><span class="ml-5">Yes</span>
													</label>
												</div>
												<div class=" form-check">
													<label class="form-check-label">
														<input type="radio" class="form-check-input" name="is_advsalary" <?php if ($button == 'Read'  || getLeaveStatus($id) == 2) echo 'disabled=disabled'; ?> <?= (strtolower($is_advsalary) == 'n') ? 'checked' : '' ?> value="<?php echo $is_advsalary; ?>"><span class="ml-5">No</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class=" col-sm-12 col-xs-12">
									<div class="form-wrap">
										<input type="hidden" name="id" value="<?php echo $id; ?>" />
										<input type="hidden" name="status" value="<?php echo $status; ?>" />
										<input type="hidden" name="approve_date" value="<?php echo $approve_date; ?>" />
										<input type="hidden" name="approve_by" value="<?php echo $approve_by; ?>" />
										<input type="hidden" name="entry_user" value="<?php echo $entry_user; ?>" />
										<input type="hidden" name="paidadvdate" value="<?php echo $paidadvdate; ?>" />
										<input type="hidden" name="is_paidadv" value="<?php echo $is_paidadv; ?>" />
										<input type="hidden" name="next_approval" value="<?php echo $next_approval; ?>" />
										<input type="hidden" name="spv_approved_by" value="<?php echo $spv_approved_by; ?>" />
										<input type="hidden" name="spv_approved_date" value="<?php echo $spv_approved_date; ?>" />
										<input type="hidden" name="director_approved_by" value="<?php echo $director_approved_by; ?>" />
										<input type="hidden" name="director_approved_date" value="<?php echo $director_approved_date; ?>" />
										<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
										<a href="<?php echo site_url('leave') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
								</form>
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
	$(function() {
		$('#sdate,#edate').on('dp.change', function(e) {
			countDay();
		});
		$("#emp_no, #leave_type").on('change', function() {
			var emp_no = $("#emp_no").val();
			var leave_type = $("#leave_type").val();

			$.post('<?= base_url(); ?>leave/curbalance', {
				emp_no: emp_no,
				leave_type: leave_type
			}, function(data) {
				$("#curbalance").val(data);
			});
		});
	});

	function showPrint() {
		var myWindow = window.open('<?= base_url(); ?>leave/print/<?= $this->uri->segment(3); ?>', 'myWindow', 'width=200,height=100');
		setTimeout(function() {
			myWindow.close();
		}, 3000);
	}

	function countDay() {
		var sdate = $("#sdate").val();
		var edate = $("#edate").val();

		sdate = new Date(sdate);
		edate = new Date(edate);

		var Difference_In_Time = edate.getTime() - sdate.getTime();
		var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

		$("#total_day").val(Difference_In_Days);
		$("#hours").val(Difference_In_Days * 8);
	}
</script>