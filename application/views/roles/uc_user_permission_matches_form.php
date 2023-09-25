<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Manage Role</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Manage Role</span></a></li>
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
							<h6 class="panel-title txt-dark">Manage Role Form</h6>
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
												<label for="int">User Id <?php echo form_error('user_id') ?></label>
												<?= cboEmpNoActive('user_id', $user_id, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="int">Permission Id <?php echo form_error('permission_Id') ?></label>
												<?= cboPermission('permission_Id', $permission_Id, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
											<a href="<?php echo site_url('roles') ?>" class="btn btn-default">Cancel</a>
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