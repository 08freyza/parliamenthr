<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Employee</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="#"><span>Employee</span></a></li>
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
							<h6 class="panel-title txt-dark">Employee Form</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<form action="<?php echo $action; ?>" method="post">
								<div class="row">
									<div class="col-sm-6 col-xs-6">
										<div class="form-wrap">
											<div class="form-group">
												<label for="varchar">Employee Number <?php echo form_error('emp_no') ?></label>
												<input type="text" class="form-control" name="emp_no" id="emp_no" placeholder="Employee Number" <?= ($button != 'Create' ? 'Readonly' : ''); ?> value="<?php echo $emp_no; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Employee Name <?php echo form_error('emp_name') ?></label>
												<input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="Employee Name" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $emp_name; ?>" />
											</div>
											<div class="form-group">
												<label for="ministry">Login Username <?php echo form_error('login_id') ?></label>
												<?= cboUsers('login_id', $login_id, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="bigint">Account No <?php echo form_error('account_no') ?></label>
												<input type="text" class="form-control" name="account_no" id="account_no" placeholder="Account No" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $account_no; ?>" />
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="date">Effective Date <?php echo form_error('joindate') ?></label>
													<input type="text" class="form-control tanggal" name="joindate" id="joindate" placeholder="Effective Date" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $joindate; ?>" />
												</div>
											</div>
											<div class="form-group">
												<div class='input-group col-sm-12 col-xs-12'>
													<label for="date">Birthday <?php echo form_error('birthday') ?></label>
													<input type="text" class="form-control tanggal" name="birthday" id="birthday" placeholder="Birthday" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $birthday; ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="varchar">Province <?php echo form_error('province') ?></label>
												<input type="text" class="form-control" name="province" id="province" placeholder="Province" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $province; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Island <?php echo form_error('island') ?></label>
												<input type="text" class="form-control" name="mobile_phone" id="island" placeholder="Island" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $island; ?>" />
											</div>
											<div class="form-group">
												<label for="language">Language <?php echo form_error('language') ?></label>
												<select class="form-control select2" name="language" id="language" <?php if ($button == 'Read') echo 'disabled=disabled'; ?>>
													<option value="English" <?= ($language == 'English' ? 'selected="selected"' : '') ?>>English</option>
													<option value="French" <?= ($language == 'French' ? 'selected="selected"' : '') ?>>French</option>
													<option value="Chinese" <?= ($language == 'Chinese' ? 'selected="selected"' : '') ?>>Chinese</option>
													<option value="Bilingual" <?= ($language == 'Bilingual' ? 'selected="selected"' : '') ?>>Bilingual</option>
												</select>
											</div>
											<div class="form-group">
												<label for="varchar">Mobile Phone <?php echo form_error('mobile_phone') ?></label>
												<input type="text" class="form-control" name="mobile_phone" id="mobile_phone" placeholder="Mobile Phone" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $mobile_phone; ?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Fingerscan ID <?php echo form_error('fingerid') ?></label>
												<input type="text" class="form-control" name="fingerid" id="fingerid" placeholder="Fingerscan ID" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $fingerid; ?>" />
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-6">
										<div class="form-wrap">
											<div class="form-group">
												<label for="varchar">Qualifications <?php echo form_error('qualifications') ?></label>
												<input type="text" class="form-control" name="qualifications" id="qualifications" placeholder="Qualifications" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $qualifications; ?>" />
											</div>
											<div class="form-group">
												<label for="gender">Gender <?php echo form_error('gender') ?></label>
												<?= cboGender('gender', $gender, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="marital_status">Marital Status <?php echo form_error('marital_status') ?></label>
												<?= cboMaritalStatus('marital_status', $marital_status, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="religion">Religion <?php echo form_error('religion') ?></label>
												<?= cboReligion('religion', $religion, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="title">Title <?php echo form_error('title') ?></label>
												<?= cboTitle('title', $title, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="department">Department <?php echo form_error('department') ?></label>
												<?= cboDepartment('department', $department, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="ministry">Ministry <?php echo form_error('ministry') ?></label>
												<?= cboMinistry('ministry', $ministry, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="salary_grade">Salary Grade <?php echo form_error('salary_grade') ?></label>
												<input type="text" class="form-control" name="salary_grade" id="salary_grade" placeholder="Salary Grade" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $salary_grade; ?>" />
											</div>
											<div class="form-group">
												<label for="active_status">Active Status <?php echo form_error('active_status') ?></label>
												<?= cboActiveStatus('active_status', $active_status, ($button == 'Read' ? 'disabled=disabled' : '')); ?>
											</div>
											<div class="form-group">
												<label for="vnpf">VNPF number <?php echo form_error('active_status') ?></label>
												<input type="text" class="form-control" name="vnpf" id="vnpf" placeholder="VNPF number" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> value="<?php echo $vnpf; ?>" />
											</div>
										</div>
									</div>
									<!-- <div class="col-sm-12 col-xs-12">
										<div class="form-wrap">
											
										</div>
									</div> -->
								</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6">
										<div class="form-wrap">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
											<a href="<?php echo site_url('emp_info') ?>" class="btn btn-default">Cancel</a>
										</div>
									</div>
								</div>
							</form>
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