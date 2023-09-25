
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Emp_reim</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Emp_reim</span></a></li>
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
										<h6 class="panel-title txt-dark">Emp_reim Form</h6>
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
					<?=cboEmpNo('emp_no',$emp_no,($button == 'Read' ? 'disabled=disabled':''));?>
				</div>
	    		<div class="form-group">
					<label for="int">Reim Type <?php echo form_error('reim_type') ?></label>
					<input type="text" class="form-control" name="reim_type" id="reim_type" placeholder="Reim Type"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $reim_type; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Reim Val <?php echo form_error('reim_val') ?></label>
					<input type="text" class="form-control" name="reim_val" id="reim_val" placeholder="Reim Val"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $reim_val; ?>" />
				</div>
	    		<div class="form-group">
	    		    <div class="input-group col-sm-12 col-xs-12">
    					<label for="date">Reim Date <?php echo form_error('reim_date') ?></label>
    					<input type="text" class="form-control tanggal" name="reim_date" id="reim_date" placeholder="Reim Date"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $reim_date; ?>" />
	    		    </div>
				</div>
	    		<div class="form-group">
					<label for="int">Reim Paid <?php echo form_error('reim_paid') ?></label>
					<input type="text" class="form-control" name="reim_paid" id="reim_paid" placeholder="Reim Paid"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $reim_paid; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Reim Unpaid <?php echo form_error('reim_unpaid') ?></label>
					<input type="text" class="form-control" name="reim_unpaid" id="reim_unpaid" placeholder="Reim Unpaid"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $reim_unpaid; ?>" />
				</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('myreimburst') ?>" class="btn btn-default">Cancel</a>
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