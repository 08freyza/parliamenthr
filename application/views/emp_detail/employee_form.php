
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Employee Detail</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>">Dashboard</a></li>
								<li><a href="#"><span>Employee</span></a></li>
								<li class="active"><span>Form</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->

                    <form action="<?php echo $action; ?>" method="post">
					<!-- Row -->
					<div class="row">
					    <div class="col-md-12">
					        <div class="pull-right">
					            <input class="form-control" type="text" id="txSearch" placeholder="Search"/>
					        </div>
					    </div>
					    <div class="clearfix">&nbsp;</div>
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div  class="tab-struct custom-tab-1 mt-10">
										<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab1">Detail 1</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab2">Detail 2</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab3">Detail 3</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab4">Detail 4</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab5">Detail 5</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab6">Detail 6</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab7">Detail 7</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab8">Detail 8</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#tab9">Detail 9</a></li>
										</ul>
										<div class="tab-content" id="myTabContent_7">
											<div  id="tab1" class="tab-pane fade active in" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="varchar">Emp No <?php echo form_error('emp_no') ?></label>
                                					<input type="text" class="form-control" name="emp_no" id="emp_no" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $emp_no; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Emp Name <?php echo form_error('emp_name') ?></label>
                                					<input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $emp_name; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="bigint">Account No <?php echo form_error('account_no') ?></label>
                                					<input type="text" class="form-control" name="account_no" id="account_no" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $account_no; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Official Name <?php echo form_error('official_name') ?></label>
                                					<input type="text" class="form-control" name="official_name" id="official_name" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $official_name; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="enum">Active Status <?php echo form_error('active_status') ?></label>
                                					<input type="text" class="form-control" name="active_status" id="active_status" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $active_status; ?>" />
                                				</div>
											</div>
											<div  id="tab2" class="tab-pane" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="int">Emp Status <?php echo form_error('emp_status') ?></label>
                                					<?=cboEmpStatus('emp_status',$emp_status,($button == 'Read' ? 'disabled=disabled':''));?>
                                				</div>
                                	    		<div class="form-group">
                                					<label for="enum">Gender <?php echo form_error('gender') ?></label>
                                					<input type="text" class="form-control" name="gender" id="gender" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo ucfirst($gender); ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="int">Marital Status <?php echo form_error('marital_status') ?></label>
                                					<?=cboMaritalStatus('marital_status',$marital_status,($button == 'Read' ? 'disabled=disabled':''));?>
                                				</div>
                                	    		<div class="form-group">
                                					<label for="date">Birthday <?php echo form_error('birthday') ?></label>
                                					<input type="text" class="form-control" name="birthday" id="birthday" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $birthday; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Place Birthday <?php echo form_error('place_birthday') ?></label>
                                					<input type="text" class="form-control" name="place_birthday" id="place_birthday" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $place_birthday; ?>" />
                                				</div>
											</div>
											<div  id="tab3" class="tab-pane" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="date">Joindate <?php echo form_error('joindate') ?></label>
                                					<input type="text" class="form-control" name="joindate" id="joindate" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $joindate; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="date">End Of Contract <?php echo form_error('eoc') ?></label>
                                					<input type="text" class="form-control" name="eoc" id="eoc" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $eoc; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="int">Religion <?php echo form_error('religion') ?></label>
                                					<input type="text" class="form-control" name="religion" id="religion" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $religion; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="int">Location <?php echo form_error('location') ?></label>
                                					<input type="text" class="form-control" name="location" id="location" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $location; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="int">Unit <?php echo form_error('unit') ?></label>
                                					<input type="text" class="form-control" name="unit" id="unit" placeholder="-"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $unit; ?>" />
                                				</div>
											</div>
											<div  id="tab4" class="tab-pane" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="int">Title <?php echo form_error('title') ?></label>
                                					<input type="text" class="form-control" name="title" id="title" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $title; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="int">Grade <?php echo form_error('grade') ?></label>
                                					<input type="text" class="form-control" name="grade" id="grade" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $grade; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Bank Name <?php echo form_error('bank_name') ?></label>
                                					<input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $bank_name; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Blood Type <?php echo form_error('blood_type') ?></label>
                                					<input type="text" class="form-control" name="blood_type" id="blood_type" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $blood_type; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="hospitalized">Hospitalized <?php echo form_error('hospitalized') ?></label>
                                					<textarea class="form-control" rows="3" name="hospitalized" id="hospitalized" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> ><?php echo $hospitalized; ?></textarea>
                                				</div>
											</div>
											<div  id="tab5" class="tab-pane" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="medicalcond">Medicalcond <?php echo form_error('medicalcond') ?></label>
                                					<textarea class="form-control" rows="3" name="medicalcond" id="medicalcond" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> ><?php echo $medicalcond; ?></textarea>
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Shoes <?php echo form_error('shoes') ?></label>
                                					<input type="text" class="form-control" name="shoes" id="shoes" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $shoes; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="medicaltestnotes">Medicaltestnotes <?php echo form_error('medicaltestnotes') ?></label>
                                					<textarea class="form-control" rows="3" name="medicaltestnotes" id="medicaltestnotes" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> ><?php echo $medicaltestnotes; ?></textarea>
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Pants <?php echo form_error('pants') ?></label>
                                					<input type="text" class="form-control" name="pants" id="pants" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $pants; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="int">Medtest <?php echo form_error('medtest') ?></label>
                                					<input type="text" class="form-control" name="medtest" id="medtest" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $medtest; ?>" />
                                				</div>
											</div>
											<div  id="tab6" class="tab-pane" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="varchar">Cloth <?php echo form_error('cloth') ?></label>
                                					<input type="text" class="form-control" name="cloth" id="cloth" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $cloth; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Weight <?php echo form_error('weight') ?></label>
                                					<input type="text" class="form-control" name="weight" id="weight" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $weight; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Headsize <?php echo form_error('headsize') ?></label>
                                					<input type="text" class="form-control" name="headsize" id="headsize" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $headsize; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Height <?php echo form_error('height') ?></label>
                                					<input type="text" class="form-control" name="height" id="height" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $height; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Vnpf <?php echo form_error('vnpf') ?></label>
                                					<input type="text" class="form-control" name="vnpf" id="vnpf" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $vnpf; ?>" />
                                				</div>
											</div>
											<div  id="tab7" class="tab-pane" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="address">Address <?php echo form_error('address') ?></label>
                                					<textarea class="form-control" rows="3" name="address" id="address" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> ><?php echo $address; ?></textarea>
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Mobile Phone <?php echo form_error('mobile_phone') ?></label>
                                					<input type="text" class="form-control" name="mobile_phone" id="mobile_phone" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $mobile_phone; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Home Phone <?php echo form_error('home_phone') ?></label>
                                					<input type="text" class="form-control" name="home_phone" id="home_phone" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $home_phone; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Email <?php echo form_error('email') ?></label>
                                					<input type="text" class="form-control" name="email" id="email" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $email; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="bigint">Department <?php echo form_error('department') ?></label>
                                					<input type="text" class="form-control" name="department" id="department" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $department; ?>" />
                                				</div>
											</div>
											<div  id="tab8" class="tab-pane" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="bigint">Ministry <?php echo form_error('ministry') ?></label>
                                					<input type="text" class="form-control" name="ministry" id="ministry" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $ministry; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="bigint">Division <?php echo form_error('division') ?></label>
                                					<input type="text" class="form-control" name="division" id="division" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $division; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Is Vnpf <?php echo form_error('is_vnpf') ?></label>
                                					<input type="text" class="form-control" name="is_vnpf" id="is_vnpf" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $is_vnpf; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="varchar">Is Emp <?php echo form_error('is_emp') ?></label>
                                					<input type="text" class="form-control" name="is_emp" id="is_emp" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $is_emp; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="bigint">Bankid <?php echo form_error('bankid') ?></label>
                                					<input type="text" class="form-control" name="bankid" id="bankid" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $bankid; ?>" />
                                				</div>
											</div>
											<div  id="tab9" class="tab-pane" role="tabpanel">
                                	    		<div class="form-group">
                                					<label for="bigint">Keen <?php echo form_error('keen') ?></label>
                                					<input type="text" class="form-control" name="keen" id="keen" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $keen; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="date">Keendate <?php echo form_error('keendate') ?></label>
                                					<input type="text" class="form-control" name="keendate" id="keendate" placeholder="-" <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $keendate; ?>" />
                                				</div>
                                	    		<div class="form-group">
                                					<label for="int">Fingerid <?php echo form_error('fingerid') ?></label>
                                					<input type="text" class="form-control" name="fingerid" id="fingerid" placeholder="Fingerid"  <?php if ($button == 'Read') echo 'disabled=disabled';?> value="<?php echo $fingerid; ?>" />
                                				</div>
												<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
												<?php if ($button != 'Read') { ?><button type="submit" class="btn btn-primary"><?php echo $button ?></button><?php } ?> 
											</div>
										</div>
									</div>
								<!--<a href="<?php echo site_url('emp_detail') ?>" class="btn btn-default">Cancel</a>-->
								</div>
							</div>
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
			<!-- /Main Content -->
			
			<script type="text/javascript">
			    $(function(){
			       $('#txSearch').on('keypress',function(e){
                        if (e.which==13)
                        {
                            var key = this.value;
                            $.post('<?=base_url();?>emp_detail/search',{key:key},function(data){
                                // alert(data);
                                window.location.reload();
                            });
                        }
			       });
			    });
			</script>
			
			