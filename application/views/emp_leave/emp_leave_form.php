<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Emp_leave</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Emp_leave</span></a></li>
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
							<h6 class="panel-title txt-dark">Emp_leave Form</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
										<form action="<?php echo $action; ?>" method="post">
											<div class="form-group">
												<label for="varchar">Emp No <?php echo form_error('emp_no') ?></label>
												<input type="text" class="form-control" name="emp_no" id="emp_no" placeholder="Emp No" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $emp_no; ?>" />
											</div>
											<div class="form-group">
												<label for="leave_desc">Leave Desc <?php echo form_error('leave_desc') ?></label>
												<textarea class="form-control" rows="3" name="leave_desc" id="leave_desc" placeholder="Leave Desc" <?php if ($button == 'Read') echo 'disabled=disabled'; ?>><?php echo $leave_desc; ?></textarea>
											</div>
											<div class="form-group">
												<label for="date">Sdate <?php echo form_error('sdate') ?></label>
												<input type="text" class="form-control" name="sdate" id="sdate" placeholder="Sdate" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $sdate; ?>" />
											</div>
											<div class="form-group">
												<label for="date">Edate <?php echo form_error('edate') ?></label>
												<input type="text" class="form-control" name="edate" id="edate" placeholder="Edate" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $edate; ?>" />
											</div>
											<div class="form-group">
												<label for="int">Total Day <?php echo form_error('total_day') ?></label>
												<input type="text" class="form-control" name="total_day" id="total_day" placeholder="Total Day" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $total_day; ?>" />
											</div>
											<div class="form-group">
												<label for="int">Status <?php echo form_error('status') ?></label>
												<input type="text" class="form-control" name="status" id="status" placeholder="Status" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $status; ?>" />
											</div>
											<div class="form-group">
												<label for="date">Approve Date <?php echo form_error('approve_date') ?></label>
												<input type="text" class="form-control" name="approve_date" id="approve_date" placeholder="Approve Date" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $approve_date; ?>" />
											</div>
											<div class="form-group">
												<label for="int">Leave Type <?php echo form_error('leave_type') ?></label>
												<input type="text" class="form-control" name="leave_type" id="leave_type" placeholder="Leave Type" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $leave_type; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Approve By <?php echo form_error('approve_by') ?></label>
												<input type="text" class="form-control" name="approve_by" id="approve_by" placeholder="Approve By" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $approve_by; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Entry User <?php echo form_error('entry_user') ?></label>
												<input type="text" class="form-control" name="entry_user" id="entry_user" placeholder="Entry User" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $entry_user; ?>" />
											</div>
											<div class="form-group">
												<label for="date">Paidadvdate <?php echo form_error('paidadvdate') ?></label>
												<input type="text" class="form-control" name="paidadvdate" id="paidadvdate" placeholder="Paidadvdate" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $paidadvdate; ?>" />
											</div>
											<div class="form-group">
												<label for="float">Curbalance <?php echo form_error('curbalance') ?></label>
												<input type="text" class="form-control" name="curbalance" id="curbalance" placeholder="Curbalance" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $curbalance; ?>" />
											</div>
											<div class="form-group">
												<label for="double">Hours <?php echo form_error('hours') ?></label>
												<input type="text" class="form-control" name="hours" id="hours" placeholder="Hours" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $hours; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Is Paidadv <?php echo form_error('is_paidadv') ?></label>
												<input type="text" class="form-control" name="is_paidadv" id="is_paidadv" placeholder="Is Paidadv" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $is_paidadv; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Next Approval <?php echo form_error('next_approval') ?></label>
												<input type="text" class="form-control" name="next_approval" id="next_approval" placeholder="Next Approval" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $next_approval; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Spv Approved By <?php echo form_error('spv_approved_by') ?></label>
												<input type="text" class="form-control" name="spv_approved_by" id="spv_approved_by" placeholder="Spv Approved By" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $spv_approved_by; ?>" />
											</div>
											<div class="form-group">
												<label for="datetime">Spv Approved Date <?php echo form_error('spv_approved_date') ?></label>
												<input type="text" class="form-control" name="spv_approved_date" id="spv_approved_date" placeholder="Spv Approved Date" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $spv_approved_date; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Director Approved By <?php echo form_error('director_approved_by') ?></label>
												<input type="text" class="form-control" name="director_approved_by" id="director_approved_by" placeholder="Director Approved By" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $director_approved_by; ?>" />
											</div>
											<div class="form-group">
												<label for="datetime">Director Approved Date <?php echo form_error('director_approved_date') ?></label>
												<input type="text" class="form-control" name="director_approved_date" id="director_approved_date" placeholder="Director Approved Date" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $director_approved_date; ?>" />
											</div>
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
											<a href="<?php echo site_url('emp_leave') ?>" class="btn btn-default">Cancel</a>
										</form>
									</div>
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