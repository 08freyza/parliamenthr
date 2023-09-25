
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<h2 style="margin-top:0px">Sub Category Data</h2>
				<form action="<?php echo $action; ?>" method="post">
	    		<div class="form-group">
					<label for="bigint">Category <?php echo form_error('id_cat') ?></label>
					<?=cboCategory('id_cat',$id_cat,($button == 'Read' ? 'disabled=\'disabled\'' : ''));?>
				</div>
	    		<div class="form-group">
					<label for="varchar">Sub Category Name <?php echo form_error('sub_desc') ?></label>
					<input type="text" class="form-control" name="sub_desc" id="sub_desc" placeholder="Sub Category Name"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $sub_desc; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Active <?php echo form_error('active') ?></label>
					<?=cboActiveStatus('active',$active,($button == 'Read' ? 'disabled=\'disabled\'' : ''));?>
				</div>
				<input type="hidden" class="form-control" name="creation_date" id="creation_date" value="<?php echo $creation_date; ?>" />
	    		<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    		<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
	    		<a href="<?php echo site_url('subcat') ?>" class="btn btn-default">Cancel</a>
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
		$("select").select2();
	</script>
