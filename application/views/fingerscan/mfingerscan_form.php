
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Fingerscan</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Fingerscan</span></a></li>
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
										<h6 class="panel-title txt-dark">Fingerscan Form</h6>
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
					<label for="varchar">Serial Number <?php echo form_error('sn') ?></label>
					<input type="text" class="form-control" name="sn" id="sn" placeholder="Serial Number"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $sn; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Title <?php echo form_error('title') ?></label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Title"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $title; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">IP Address <?php echo form_error('ip') ?></label>
					<input type="text" class="form-control" name="ip" id="ip" placeholder="IP Address"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $ip; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Port <?php echo form_error('port') ?></label>
					<input type="text" class="form-control" name="port" id="port" placeholder="Port"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $port; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Deviceid <?php echo form_error('deviceid') ?></label>
					<input type="text" class="form-control" name="deviceid" id="deviceid" placeholder="Deviceid"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $deviceid; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Key <?php echo form_error('key') ?></label>
					<input type="text" class="form-control" name="key" id="key" placeholder="Key"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $key; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Scheduled <?php echo form_error('scheduled') ?></label>
					<select class="select2" name="scheduled" <?php if ($button == 'Read') echo 'disabled=disabled';?> >
					    <option value="scheduled" <?=($scheduled=='sheduled' ? 'selected=selected':'');?> >Scheduled</option>
					    <option value="notscheduled" <?=($scheduled=='notscheduled' ? 'selected=selected':'');?> >Not Scheduled</option>
					</select>
				</div>
	    		<div class="form-group">
					<label for="varchar">Type <?php echo form_error('type') ?></label>
					<input type="text" class="form-control" name="type" id="type" placeholder="Type"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $type; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Status <?php echo form_error('status') ?></label>
					<select class="select2" name="status" <?php if ($button == 'Read') echo 'disabled=disabled';?> >
					    <option value="connected" <?=($status=='connected' ? 'selected=selected':'');?> >Connected</option>
					    <option value="notconnected" <?=($status=='notconnected' ? 'selected=selected':'');?> >Not Connected</option>
					</select>
				</div>
														<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('fingerscan') ?>" class="btn btn-default">Cancel</a>
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
							<p>2017 &copy; Vanuatu HR Government. Provided by CNS</p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->

			</div>
			<!-- /Main Content -->