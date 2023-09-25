
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<h2 style="margin-top:0px">Category Data</h2>
				<form action="<?php echo $action; ?>" method="post">
	    		<div class="form-group">
					<label for="bigint">Category <?php echo form_error('category') ?></label>
					<input type="text" class="form-control" name="category" id="category" placeholder="Category"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $category; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Status <?php echo form_error('status') ?></label>
					<?=cboActiveStatus('status',$status,($button == 'Read' ? 'disabled=\'disabled\'' : ''));?>
				</div>
	    		<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				<input type="hidden" name="creation_date" value="<?php echo $creation_date; ?>" />
	    		<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
	    		<a href="<?php echo site_url('category') ?>" class="btn btn-default">Cancel</a>
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
