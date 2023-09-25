
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Title Setup</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Title Setup</span></a></li>
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
										<h6 class="panel-title txt-dark">Title Setup Form</h6>
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
					<label for="varchar">Title <?php echo form_error('title') ?></label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Title"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $title; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Title Code <?php echo form_error('title_code') ?></label>
					<input type="text" class="form-control" name="title_code" id="title_code" placeholder="Title Code"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $title_code; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Report To <?php echo form_error('report_to') ?></label>
					<?=cboEmpNo('report_to',$report_to,($button == 'Read' ? 'disabled=disabled' : ''));?>
				</div>
<!--	    		<div class="form-group">
					<label for="varchar">Colour <?php echo form_error('colour') ?></label>
					<input type="text" class="form-control" name="colour" id="colour" placeholder="Colour"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $colour; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Code <?php echo form_error('code') ?></label>
					<input type="text" class="form-control" name="code" id="code" placeholder="Code"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $code; ?>" />
				</div>
-->
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<input type="hidden" name="colour" value="<?php echo $colour; ?>" /> 
														<input type="hidden" name="code" value="<?php echo $code; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('titlesetup') ?>" class="btn btn-default">Cancel</a>
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