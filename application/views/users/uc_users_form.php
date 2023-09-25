			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Manage User</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?= base_url(); ?>">Dashboard</a></li>
								<li><a href="#"><span>Manage User</span></a></li>
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
										<h6 class="panel-title txt-dark">Manage User Form</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<?= validation_errors(); ?>
													<form action="<?php echo $action; ?>" method="post">
														<div class="form-group">
															<label for="varchar">User Name <?php echo form_error('user_name') ?></label>
															<input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" Readonly value="<?php echo $user_name; ?>" />
														</div>
														<div class="form-group">
															<label for="varchar">Password <?php echo form_error('password') ?></label>
															<input type="password" class="form-control" name="password" id="password" placeholder="Password" <?php if ($button == 'Read') echo 'disabled=disabled'; ?> />
														</div>
														<div class="form-group">
															<label for="varchar">Email <?php echo form_error('email') ?></label>
															<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
														</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" />
														<input type="hidden" name="display_name" value="<?php echo $display_name; ?>" />
														<input type="hidden" name="activation_token" value="<?php echo $activation_token; ?>" />
														<input type="hidden" name="last_activation_request" value="<?php echo $last_activation_request; ?>" />
														<input type="hidden" name="lost_password_request" value="<?php echo $lost_password_request; ?>" />
														<input type="hidden" name="title" value="<?php echo $title; ?>" />
														<input type="hidden" name="sign_up_stamp" value="<?php echo $sign_up_stamp; ?>" />
														<input type="hidden" name="last_sign_in_stamp" value="<?php echo $last_sign_in_stamp; ?>" />
														<input type="hidden" name="active" value="<?php echo $active; ?>" />
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?>
														<a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
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