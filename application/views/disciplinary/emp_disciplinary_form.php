<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Disciplinary</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Disciplinary</span></a></li>
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
							<h6 class="panel-title txt-dark">Disciplinary Form</h6>
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
												<input type="hidden" class="form-control" name="disciple_no" id="disciple_no" placeholder="Disciple No" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $disciple_no; ?>" />
											</div>
											<div class="form-group">
												<label for="emp_no">Emp No <?php echo form_error('emp_no') ?></label>
												<?= cboEmpNo('emp_no', $emp_no, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="disciple_category">Disciple Category <?php echo form_error('disciple_category') ?></label>
												<?= cboDiscipleCat('disciple_category', $disciple_category, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="timestamp">Disciple Date <?php echo form_error('disciple_date') ?></label>
													<input type="text" class="form-control tanggal" name="disciple_date" id="disciple_date" placeholder="Disciple Date" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $disciple_date; ?>" />
												</div>
											</div>
											<div class="form-group">
												<input type="hidden" class="form-control" name="sdate" id="sdate" placeholder="Sdate" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $sdate; ?>" />
											</div>
											<div class="form-group">
												<input type="hidden" class="form-control" name="edate" id="edate" placeholder="Edate" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $edate; ?>" />
											</div>
											<div class="form-group">
												<label for="remark">Remark <?php echo form_error('remark') ?></label>
												<textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" <?php if ($button == 'Read') echo 'disabled=disabled'; ?>><?php echo $remark; ?></textarea>
											</div>
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
											<a href="<?php echo site_url('disciplinary') ?>" class="btn btn-default">Cancel</a>
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