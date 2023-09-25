
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Training_institution</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Training_institution</span></a></li>
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
										<h6 class="panel-title txt-dark">Training_institution Form</h6>
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
					<label for="varchar">Institution Name <?php echo form_error('institution_name') ?></label>
					<input type="text" class="form-control" name="institution_name" id="institution_name" placeholder="Institution Name"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $institution_name; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Address <?php echo form_error('address') ?></label>
					<input type="text" class="form-control" name="address" id="address" placeholder="Address"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $address; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Phone <?php echo form_error('phone') ?></label>
					<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $phone; ?>" />
				</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('institutionsetup') ?>" class="btn btn-default">Cancel</a>
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