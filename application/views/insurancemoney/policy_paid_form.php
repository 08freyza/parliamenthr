
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="row clearfix">&nbsp;</div>
			<div class="container-fluid">
				<h2 style="margin-top:0px">Policy Payment</h2>
				<form action="<?php echo $action; ?>" method="post">
	    		<div class="form-group">
					<label for="bigint">Policy Name <?php echo form_error('policy_id') ?></label>
					<?=cboPolicyApplied('policy_id',$policy_id,($button == 'Read' ? 'disabled=\'disabled\'' : ''));?>
				</div>
	    		<div class="form-group">
					<label for="float">Amount <?php echo form_error('amount') ?></label>
					<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $amount; ?>" />
				</div>
	    		<div class="form-group">
					<label for="int">Teneur <?php echo form_error('teneur') ?></label>
					<input type="text" class="form-control" name="teneurx" id="teneurx" placeholder="Teneur" disabled='disabled' value="<?php echo $teneur; ?>" />
				</div>
	    		<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				<input type="hidden" name="client_id" value="<?php echo $client_id; ?>" />
				<input type="hidden" name="paiddate" value="<?php echo $paiddate; ?>" />
				<input type="hidden" id="teneur" name="teneur" value="<?php echo $teneur; ?>" />
	    		<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
	    		<a href="<?php echo site_url('insurancemoney') ?>" class="btn btn-default">Cancel</a>
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
			$('#policy_id').on('change',function(){
				$.post('<?=base_url();?>index.php/insurancemoney/appliedteneur',{id:this.value},function(data){
					$("#teneur").val(data);$("#teneurx").val(data);
				});
			});
		});
	</script>