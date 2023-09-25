
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<h2 style="margin-top:0px">Insurance Type Data</h2>
				<form action="<?php echo $action; ?>" method="post">
	    		<div class="form-group">
					<label for="varchar">Desc <?php echo form_error('desc') ?></label>
					<input type="text" class="form-control" name="desc" id="desc" placeholder="Desc"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $desc; ?>" />
				</div>
	    		<input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    		<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
	    		<a href="<?php echo site_url('transtype') ?>" class="btn btn-default">Cancel</a>
				</form>
			</div>
		</div>
	</div>