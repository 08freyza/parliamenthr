<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Permission Page Matches</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Permission Page Matches</span></a></li>
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
							<h6 class="panel-title txt-dark">Permission Page Matches Form</h6>
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
												<label for="permission_id">Resource Name <?php echo form_error('permission_id') ?></label>
												<?= cboPermissionId('permission_id', $permission_id, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="page_id">Resource Name <?php echo form_error('page_id') ?></label>
												<?= cboPageId('page_id', $page_id, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<!-- <div class="form-group">
												<input type="checkbox" id="create_active" name="create_active" value="Y">
												<label for="create_active" class="ml-10"> Create Active</label><br>
											</div> -->
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="varchar">Create Active <?php echo form_error('create_active') ?></label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="create_active" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> <?= (strtolower($create_active) == 'y') ? 'checked' : '' ?> value="Y"><span class="ml-10">Active</span>
														</label>
													</div>
													<div class=" form-check">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="create_active" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> <?= (strtolower($create_active) == 'n') ? 'checked' : '' ?> value="N"><span class="ml-10">Non-Active</span>
														</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="varchar">Update Active <?php echo form_error('update_active') ?></label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="update_active" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> <?= (strtolower($update_active) == 'y') ? 'checked' : '' ?> value="Y"><span class="ml-10">Active</span>
														</label>
													</div>
													<div class=" form-check">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="update_active" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> <?= (strtolower($update_active) == 'n') ? 'checked' : '' ?> value="N"><span class="ml-10">Non-Active</span>
														</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="varchar">Delete Active <?php echo form_error('delete_active') ?></label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="delete_active" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> <?= (strtolower($delete_active) == 'y') ? 'checked' : '' ?> value="Y"><span class="ml-10">Active</span>
														</label>
													</div>
													<div class=" form-check">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="delete_active" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> <?= (strtolower($delete_active) == 'n') ? 'checked' : '' ?> value="N"><span class="ml-10">Non-Active</span>
														</label>
													</div>
												</div>
											</div>
											<!-- <div class="form-group">
												<input type="checkbox" id="update_active" name="update_active" value="Y">
												<label for="update_active" class="ml-10"> Update Active</label><br>
											</div>
											<div class="form-group">
												<input type="checkbox" id="delete_active" name="delete_active" value="Y">
												<label for="delete_active" class="ml-10"> Delete Active</label><br><br>
											</div> -->
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
											<a href="<?php echo site_url('permission_page_matches') ?>" class="btn btn-default">Cancel</a>
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