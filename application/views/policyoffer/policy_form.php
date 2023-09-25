
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<h2 style="margin-top:0px">Policy Data</h2>
				<form action="<?php echo $action; ?>" method="post">
	    		<div class="form-group">
					<label for="bigint">Id Cat <?php echo form_error('id_cat') ?></label>
					<input type="text" class="form-control" name="id_cat" id="id_cat" placeholder="Id Cat"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $id_cat; ?>" />
				</div>
	    		<div class="form-group">
					<label for="bigint">Id Subcat <?php echo form_error('id_subcat') ?></label>
					<input type="text" class="form-control" name="id_subcat" id="id_subcat" placeholder="Id Subcat"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $id_subcat; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Policy Name <?php echo form_error('policy_name') ?></label>
					<input type="text" class="form-control" name="policy_name" id="policy_name" placeholder="Policy Name"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $policy_name; ?>" />
				</div>
	    		<div class="form-group">
					<label for="bigint">Sum Assured <?php echo form_error('sum_assured') ?></label>
					<input type="text" class="form-control" name="sum_assured" id="sum_assured" placeholder="Sum Assured"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $sum_assured; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Premium <?php echo form_error('premium') ?></label>
					<input type="text" class="form-control" name="premium" id="premium" placeholder="Premium"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $premium; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Tenure <?php echo form_error('tenure') ?></label>
					<input type="text" class="form-control" name="tenure" id="tenure" placeholder="Tenure"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $tenure; ?>" />
				</div>
	    		<div class="form-group">
					<label for="varchar">Status <?php echo form_error('status') ?></label>
					<input type="text" class="form-control" name="status" id="status" placeholder="Status"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $status; ?>" />
				</div>
	    		<div class="form-group">
					<label for="date">Created Date <?php echo form_error('created_date') ?></label>
					<input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $created_date; ?>" />
				</div>
	    		<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    		<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
	    		<a href="<?php echo site_url('policyoffer') ?>" class="btn btn-default">Cancel</a>
				</form>
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
	</div>