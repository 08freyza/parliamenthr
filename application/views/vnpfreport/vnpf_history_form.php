
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Vnpf_history</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Vnpf_history</span></a></li>
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
										<h6 class="panel-title txt-dark">Vnpf_history Form</h6>
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
					<label for="decimal">Amount <?php echo form_error('amount') ?></label>
					<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $amount; ?>" />
				</div>
	    		<div class="form-group">
					<label for="decimal">Vnpf <?php echo form_error('vnpf') ?></label>
					<input type="text" class="form-control" name="vnpf" id="vnpf" placeholder="Vnpf"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $vnpf; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Month <?php echo form_error('month') ?></label>
					<?=cboMonth('month',$month,($button == 'Read' ? 'disabled=disabled':''));?>
				</div>
	    		<div class="form-group">
					<label for="int">Year <?php echo form_error('year') ?></label>
					<?=cboYear('year',$year,($button == 'Read' ? 'disabled=disabled':''));?>
				</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('vnpfreport') ?>" class="btn btn-default">Cancel</a>
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