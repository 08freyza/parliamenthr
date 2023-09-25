
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">My Loan</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>My Loan</span></a></li>
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
										<h6 class="panel-title txt-dark">My Loan Form</h6>
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
	    		    <div class="input-group col-sm-12 col-xs-12">
    					<label for="date">Request Date <?php echo form_error('requestdate') ?></label>
    					<input type="text" class="form-control tanggal" name="requestdate" id="requestdate" placeholder=""  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $requestdate; ?>" />
	    		    </div>
				</div>
	    		<div class="form-group">
					<label for="int">Type <?php echo form_error('type') ?></label>
					<?=cboLoanType('type',$type,($button == 'Read' ? 'disabled=disabled':''));?>
				</div>
	    		<div class="form-group">
					<label for="int">Amount <?php echo form_error('amount') ?></label>
					<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $amount; ?>" />
				</div>
	    		<div class="form-group">
	    		    <div class="input-group col-sm-12 col-xs-12">
    					<label for="int">Start Payment Date <?php echo form_error('startpayment') ?></label>
    					<input type="text" class="form-control tanggal" name="startpayment" id="startpayment" placeholder="Startpayment"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $startpayment; ?>" />
    				</div>
				</div>
	    		<div class="form-group">
					<label for="remark">Notes <?php echo form_error('remark') ?></label>
					<textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark"  <?php if ($button == 'Read') echo 'disabled=disabled';?> ><?php echo $remark; ?></textarea>
				</div>
	    		<div class="form-group">
					<label for="int">Installment Amount <?php echo form_error('installmentamount') ?></label>
					<input type="text" class="form-control" name="installmentamount" id="installmentamount" placeholder="Installment amount"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $installmentamount; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Loan Period <?php echo form_error('loanperiod') ?></label>
					<input type="text" class="form-control" name="loanperiod" id="loanperiod" placeholder="Loan Period"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $loanperiod; ?>" />
				</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<input type="hidden" name="emp_no" value="<?php echo $emp_no; ?>" /> 
														<input type="hidden" name="balance" value="<?php echo $balance; ?>" /> 
														<input type="hidden" name="totalpayment" value="<?php echo $totalpayment; ?>" /> 
														<input type="hidden" name="interest" value="<?php echo $interest; ?>" /> 
														<input type="hidden" name="loanprocess" value="<?php echo $loanprocess; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('myloan') ?>" class="btn btn-default">Cancel</a>
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