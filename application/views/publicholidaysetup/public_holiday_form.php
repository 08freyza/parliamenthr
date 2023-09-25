<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Public Holiday</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Public Holiday</span></a></li>
					<li class="active"><span>Public Holiday Form</span></li>
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
							<h6 class="panel-title txt-dark">Public Holiday Form</h6>
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
												<label for="public_holiday_date">Date <?php echo form_error('public_holiday_date') ?></label>
												<input type="date" class="form-control" name="public_holiday_date" id="public_holiday_date" placeholder="Name" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $public_holiday_date; ?>" />
											</div>
											<div class="form-group">
												<label for="public_holiday_remark">Remark <?php echo form_error('public_holiday_remark') ?></label>
												<input type="text" class="form-control" name="public_holiday_remark" id="public_holiday_remark" placeholder="Enter remark" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $public_holiday_remark; ?>" />
											</div>
											<input type="hidden" name="public_holiday_id" value="<?php echo $public_holiday_id; ?>" />
											<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
											<a href="<?php echo site_url('publicholidaysetup') ?>" class="btn btn-default">Cancel</a>
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