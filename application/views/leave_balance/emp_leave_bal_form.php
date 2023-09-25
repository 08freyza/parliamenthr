<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Leave Balance</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Leave Balance</span></a></li>
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
							<h6 class="panel-title txt-dark">Leave Balance Form</h6>
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
												<label for="int">Leave Type <?php echo form_error('leave_type') ?></label>
												<?= cboLeaveType('leave_type', $leave_type, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="varchar">Balance <?php echo form_error('balance') ?></label>
												<input type="text" class="form-control" name="balance" id="balance" placeholder="Balance" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $balance; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Emp No <?php echo form_error('emp_no') ?></label>
												<?= cboEmpNo('emp_no', $emp_no, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<input type="hidden" name="latestupdate" value="<?php echo $latestupdate; ?>" />
											<input type="hidden" name="latestid" value="<?php echo $latestid; ?>" />
											<input type="hidden" name="updatedate" value="<?php echo $updatedate; ?>" />
											<input type="hidden" name="updateid" value="<?php echo $updateid; ?>" />
											<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
											<a href="<?php echo site_url('leave_balance') ?>" class="btn btn-default">Cancel</a>
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