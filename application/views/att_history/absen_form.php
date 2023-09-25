
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Absen</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Absen</span></a></li>
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
										<h6 class="panel-title txt-dark">Absen Form</h6>
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
					<label for="varchar">Emp No <?php echo form_error('emp_no') ?></label>
					<input type="text" class="form-control" name="emp_no" id="emp_no" placeholder="Emp No"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $emp_no; ?>" />
				</div>
	    		<div class="form-group">
					<label for="timestamp">Start Time <?php echo form_error('start_time') ?></label>
					<input type="text" class="form-control" name="start_time" id="start_time" placeholder="Start Time"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $start_time; ?>" />
				</div>
	    		<div class="form-group">
					<label for="timestamp">End Time <?php echo form_error('end_time') ?></label>
					<input type="text" class="form-control" name="end_time" id="end_time" placeholder="End Time"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $end_time; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Ot <?php echo form_error('ot') ?></label>
					<input type="text" class="form-control" name="ot" id="ot" placeholder="Ot"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $ot; ?>" />
				</div>
	    		<div class="form-group">
					<label for="timestamp">Lunch Out <?php echo form_error('lunch_out') ?></label>
					<input type="text" class="form-control" name="lunch_out" id="lunch_out" placeholder="Lunch Out"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $lunch_out; ?>" />
				</div>
	    		<div class="form-group">
					<label for="timestamp">Lunch In <?php echo form_error('lunch_in') ?></label>
					<input type="text" class="form-control" name="lunch_in" id="lunch_in" placeholder="Lunch In"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $lunch_in; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Type <?php echo form_error('type') ?></label>
					<input type="text" class="form-control" name="type" id="type" placeholder="Type"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $type; ?>" />
				</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('att_history') ?>" class="btn btn-default">Cancel</a>
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