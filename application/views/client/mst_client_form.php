
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Mst_client</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Mst_client</span></a></li>
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
										<h6 class="panel-title txt-dark">Form with icon</h6>
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
					<label for="bigint">Number <?php echo form_error('number') ?></label>
					<input type="text" class="form-control" name="number" id="number" placeholder="Number"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $number; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Type <?php echo form_error('type') ?></label>
					<input type="text" class="form-control" name="type" id="type" placeholder="Type"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $type; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Name <?php echo form_error('name') ?></label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Name"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $name; ?>" />
				</div>
	    		<div class="form-group">
					<label for="date">Dob <?php echo form_error('dob') ?></label>
					<input type="text" class="form-control" name="dob" id="dob" placeholder="Dob"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $dob; ?>" />
				</div>
	    		<div class="form-group">
					<label for="enum">Gender <?php echo form_error('gender') ?></label>
					<input type="text" class="form-control" name="gender" id="gender" placeholder="Gender"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $gender; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Mobile <?php echo form_error('mobile') ?></label>
					<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $mobile; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Email <?php echo form_error('email') ?></label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Email"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $email; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Address <?php echo form_error('address') ?></label>
					<input type="text" class="form-control" name="address" id="address" placeholder="Address"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $address; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">City <?php echo form_error('city') ?></label>
					<input type="text" class="form-control" name="city" id="city" placeholder="City"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $city; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Nation <?php echo form_error('nation') ?></label>
					<input type="text" class="form-control" name="nation" id="nation" placeholder="Nation"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $nation; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">State <?php echo form_error('state') ?></label>
					<input type="text" class="form-control" name="state" id="state" placeholder="State"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $state; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Photo <?php echo form_error('photo') ?></label>
					<input type="text" class="form-control" name="photo" id="photo" placeholder="Photo"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $photo; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Num Of Payment <?php echo form_error('num_of_payment') ?></label>
					<input type="text" class="form-control" name="num_of_payment" id="num_of_payment" placeholder="Num Of Payment"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $num_of_payment; ?>" />
				</div>
	    		<div class="form-group">
					<label for="float">Init Amount <?php echo form_error('init_amount') ?></label>
					<input type="text" class="form-control" name="init_amount" id="init_amount" placeholder="Init Amount"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $init_amount; ?>" />
				</div>
	    		<div class="form-group">
					<label for="datetime">Transdate <?php echo form_error('transdate') ?></label>
					<input type="text" class="form-control" name="transdate" id="transdate" placeholder="Transdate"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $transdate; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Password <?php echo form_error('password') ?></label>
					<input type="text" class="form-control" name="password" id="password" placeholder="Password"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $password; ?>" />
				</div>
														<input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
														<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
														<a href="<?php echo site_url('client') ?>" class="btn btn-default">Cancel</a>
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