		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="row clearfix">&nbsp;</div>
			<div class="container-fluid">
				<h2 style="margin-top:0px">Policy Apply Confirmation</h2>
				<div class="row clearfix">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="bigint">Policy Name<?php echo form_error('id_cat') ?></label>
							<input type="text" class="form-control" disabled='disabled' value="<?=$policy_name;?>" />
						</div>
						<div class="form-group">
							<label for="bigint">Sub Assured<?php echo form_error('id_cat') ?></label>
							<input type="text" class="form-control" disabled='disabled' value="<?=$sum_assured;?>" />
						</div>
						<div class="form-group">
							<label for="bigint">Premium<?php echo form_error('id_cat') ?></label>
							<input type="text" class="form-control" disabled='disabled' value="<?=$premium;?>" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="bigint">Category<?php echo form_error('id_cat') ?></label>
							<input type="text" class="form-control" disabled="disabled" value="<?=$category;?>" />
						</div>
						<div class="form-group">
							<label for="bigint">Sub Category<?php echo form_error('id_cat') ?></label>
							<input type="text" class="form-control" disabled='disabled' value="<?=$sub_category;?>" />
						</div>
						<div class="form-group">
							<label for="bigint">Tenure<?php echo form_error('id_cat') ?></label>
							<input type="text" class="form-control" disabled='disabled' value="<?=$tenure;?>" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-sm-12">
						<button type="button" class="btn btn-primary" onClick="window.location.href='<?=base_url();?>index.php/policyoffer/applyconfirmed/<?=$id;?>';" >Apply</button>&nbsp;
						<a href="<?php echo site_url('policyoffer') ?>" class="btn btn-default">Cancel</a>
					</div>
				</div>
			</div>
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2017 &copy; CIS. Car Insurance System</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
		</div>
	</div>