
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Emp_disciple</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Emp_disciple</span></a></li>
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
										<h6 class="panel-title txt-dark">Emp_disciple Form</h6>
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
					<label for="varchar">Disciple No <?php echo form_error('disciple_no') ?></label>
					<input type="text" class="form-control" name="disciple_no" id="disciple_no" placeholder="Disciple No"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $disciple_no; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Emp No <?php echo form_error('emp_no') ?></label>
					<input type="text" class="form-control" name="emp_no" id="emp_no" placeholder="Emp No"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $emp_no; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Disciple Category <?php echo form_error('disciple_category') ?></label>
					<input type="text" class="form-control" name="disciple_category" id="disciple_category" placeholder="Disciple Category"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $disciple_category; ?>" />
				</div>
	    		<div class="form-group">
					<label for="date">Disciple Date <?php echo form_error('disciple_date') ?></label>
					<input type="text" class="form-control" name="disciple_date" id="disciple_date" placeholder="Disciple Date"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $disciple_date; ?>" />
				</div>
	    		<div class="form-group">
					<label for="date">Sdate <?php echo form_error('sdate') ?></label>
					<input type="text" class="form-control" name="sdate" id="sdate" placeholder="Sdate"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $sdate; ?>" />
				</div>
	    		<div class="form-group">
					<label for="date">Edate <?php echo form_error('edate') ?></label>
					<input type="text" class="form-control" name="edate" id="edate" placeholder="Edate"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $edate; ?>" />
				</div>
	    		<div class="form-group">
					<label for="remark">Remark <?php echo form_error('remark') ?></label>
					<textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark"  <?php if ($button == 'Read') echo 'disabled=disabled';?> ><?php echo $remark; ?></textarea>
				</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('mydisciple') ?>" class="btn btn-default">Cancel</a>
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