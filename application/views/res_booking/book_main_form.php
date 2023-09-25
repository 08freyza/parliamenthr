<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Resource Booking</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Resource Booking</span></a></li>
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
							<h6 class="panel-title txt-dark">Resource Booking Form</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<form action="<?php echo $action; ?>" method="post">
									<div class="col-sm-6 col-xs-6">
										<div class="form-wrap">
											<div class="form-group">
												<label for="varchar">Booking No <?php echo form_error('booking_no') ?></label>
												<input type="text" class="form-control" name="booking_no" id="booking_no" placeholder="Booking No" Readonly value="<?php echo $booking_no; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Requester <?php echo form_error('requester') ?></label>
												<input type="text" class="form-control" name="requester" id="requester" placeholder="Requester" Readonly value="<?php echo $requester; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Request For <?php echo form_error('request_for') ?></label>
												<?= cboEmpNo('request_for', $request_for, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="timestamp">Start Date <?php echo form_error('start_date') ?></label>
													<input type="text" class="form-control tanggal" name="start_date" id="start_date" placeholder="Start Date" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $start_date; ?>" />
												</div>
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="timestamp">End Date <?php echo form_error('end_date') ?></label>
													<input type="text" class="form-control tanggal" name="end_date" id="end_date" placeholder="End Date" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $end_date; ?>" />
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-6">
										<div class="form-group resource-type-input">
											<label for="int">Resource Type <?php echo form_error('resource_type') ?></label>
											<?= cboResType('resource_type', $resource_type, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
										</div>
										<div class="form-group resource-name-input">
											<label for="resource_name">Resource Name <?php echo form_error('resource_name') ?></label>
											<?= cboResTypeNameAll('resource_name', $resource_name, $resource_type, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
										</div>
										<div class="form-group">
											<label for="quantity">Quantity <?php echo form_error('quantity') ?></label>
											<input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $quantity; ?>" />
										</div>
										<div class="form-group">
											<label for="asset_id">Asset ID <?php echo form_error('asset_id') ?></label>
											<input type="text" class="form-control" name="asset_id" id="asset_id" placeholder="Asset ID" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $asset_id; ?>" />
										</div>
										<div class="form-group">
											<label for="notes">Notes <?php echo form_error('notes') ?></label>
											<textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Notes" <?php if ($button == 'Read') echo 'disabled=disabled'; ?>><?php echo $notes; ?></textarea>
										</div>
									</div>
									<div class="col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
											<a href="<?php echo site_url('res_booking') ?>" class="btn btn-default">Cancel</a>
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