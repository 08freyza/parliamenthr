
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Emp_department</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Emp_department</span></a></li>
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
										<h6 class="panel-title txt-dark">Emp_department Form</h6>
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
															<label for="varchar">Name <?php echo form_error('name') ?></label>
															<input type="text" class="form-control" name="name" id="name" placeholder="Name"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $name; ?>" />
														</div>
														<div class="form-group">
															<label for="bigint">Ministry Name <?php echo form_error('ministryid') ?></label>
															<?=cboMinistry('ministryid',$ministryid,($button == 'Read' ? 'disabled=disabled':''));?>
														</div>
														<div class="clearfix">&nbsp;</div>
														<div class="form-group">
															<label for="bigint">Division Name <?php echo form_error('divisionid') ?></label>
															<?=cboDivision('divisionid',$divisionid,($button == 'Read' ? 'disabled=disabled':''));?>
														</div>
														<div class="clearfix">&nbsp;</div>
														<div class="form-group">
															<label for="varchar">Report To <?php echo form_error('report_to') ?></label>
															<?=cboEmpNo('report_to',$report_to,($button == 'Read' ? 'disabled=disabled' : ''));?>
														</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('deptsetup') ?>" class="btn btn-default">Cancel</a>
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
							<p><?=footerSetup();?></p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->

			</div>
			<!-- /Main Content -->