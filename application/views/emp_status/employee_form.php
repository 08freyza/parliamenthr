
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
								<li><a href="<?=base_url();?>">Dashboard</a></li>
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
										<div class="row">
											<form action="<?php echo $action; ?>" method="post">
												<div class="col-sm-6 col-xs-6">
													<div class="form-wrap">
														<div class="form-group">
															<label for="varchar">Emp No <?php echo form_error('emp_no') ?></label>
															<input type="text" class="form-control" name="emp_no" id="emp_no" placeholder="Emp No" Readonly value="<?php echo $emp_no; ?>" />
														</div>
														<div class="form-group">
															<label for="varchar">Emp Name <?php echo form_error('emp_name') ?></label>
															<input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="Emp Name" Readonly value="<?php echo $emp_name; ?>" />
														</div>
														<div class="form-group">
															<label for="date">Joindate <?php echo form_error('joindate') ?></label>
															<input type="text" class="form-control" name="joindate" id="joindate" placeholder="Joindate" Readonly value="<?php echo $joindate; ?>" />
														</div>
													</div>
												</div>
												<div class="col-sm-6 col-xs-6">
													<div class="form-wrap">
														<div class="form-group">
															<label for="int">Emp Status <?php echo form_error('emp_status') ?></label>
															<?=cboEmpStatus('emp_status',$emp_status,($button == 'Read' ? 'disabled=disabled':''));?>
														</div>
														<div class="form-group">
															<div class="input-group col-sm-12 col-xs-12">
																<label for="date">End Of Contract <?php echo form_error('eoc') ?></label>
																<input type="text" class="form-control tanggal" name="eoc" id="eoc" placeholder="End Of Contract"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $eoc; ?>" />
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-12 col-xs-12">
													<div class="form-wrap">
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('emp_status') ?>" class="btn btn-default">Cancel</a>
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
							<p><?=footerSetup();?></p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->

			</div>
			<!-- /Main Content -->