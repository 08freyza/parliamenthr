
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<h2 style="margin-top:0px">Policy Data</h2>
				<form action="<?php echo $action; ?>" method="post">
					<div class="row clearfix">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="bigint">Category <?php echo form_error('id_cat') ?></label>
								<?=cboCategory('id_cat',$id_cat,($button == 'Read' ? 'disabled=\'disabled\'' : ''));?>
							</div>
							<div class="form-group">
								<label for="bigint">Sub Category <?php echo form_error('id_subcat') ?></label>
								<?=cboSubCategory('id_subcat',$id_subcat,($button == 'Read' ? 'disabled=\'disabled\'' : ''));?>
							</div>
							<div class="form-group">
								<label for="varchar">Policy Name <?php echo form_error('policy_name') ?></label>
								<input type="text" class="form-control" name="policy_name" id="policy_name" placeholder="Policy Name"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $policy_name; ?>" />
							</div>
							<div class="form-group">
								<label for="bigint">Sum Assured <?php echo form_error('sum_assured') ?></label>
								<input type="text" class="form-control" name="sum_assured" id="sum_assured" placeholder="Sum Assured"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $sum_assured; ?>" />
							</div>
						</div>
						<div class="col-sm-6">
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
								<?=cboActiveStatus('status',$status,($button == 'Read' ? 'disabled=\'disabled\'' : ''));?>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-12">
							<input type="hidden" name="id" value="<?php echo $id; ?>" />
							<input type="hidden" name="created_date" value="<?php echo $created_date; ?>" />
							<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
							<a href="<?php echo site_url('policy') ?>" class="btn btn-default">Cancel</a>
						</div>
					</div>
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
	<script type="text/javascript">
		$(function(){
			$('select').select2();
		});
	</script>