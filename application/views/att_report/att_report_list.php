<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">

		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Attendance Report</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>">Dashboard</a></li>
					<li><a href="<?= base_url() . index_page(); ?>/awardsetup"><span>Attendance Report</span></a></li>
					<li class="active"><span>List</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
		<!-- /Title -->

		<!-- Row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Attendance Report</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="tab-struct custom-tab-1 mt-10">
								<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
									<li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home_tab_7" href="#att_recap">Attendance Recap</a></li>
									<li role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home_tab_7" href="#lateness">Lateness Report</a></li>
									<li role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home_tab_7" href="#att_summary">Attendance Summary</a></li>
								</ul>
								<div class="tab-content" id="myTabContent_7">
									<div id="att_recap" class="tab-pane fade active in" role="tabpanel">
										<table width="100%">
											<tr>
												<td>Month</td>
												<td width="2%">:</td>
												<td><select class="combomonth select2" name="combomonth" style="cursor: pointer;padding: 5px;width: 90%">
														<?php
														$arr_month = array('January', 'Februari', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
														for ($i = 0; $i < 12; $i++) {
															echo "<option value='" . ($i + 1) . "' >" . $arr_month[$i] . "</option>";
														}
														?>
													</select>
												</td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Year</td>
												<td width="2%">:</td>
												<td>
													<select class="comboyear select2" name="comboyear" style="cursor: pointer;padding: 5px;width: 90%">
														<?php
														$ystart = date('Y') - 5;
														$yend   = $ystart + 15;
														for ($i = $ystart; $i <= $yend; $i++) {
															echo "<option value='" . $i . "' " . ($i == date('Y') ? 'selected=selected' : '') . ">" . $i . "</option>";
														}
														?>
													</select>
												</td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Department</td>
												<td width="2%">:</td>
												<td width="80%"><?= cboDepartment('cboDepartment'); ?></td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Ministry</td>
												<td width="2%">:</td>
												<td width="80%"><?= cboMinistry('cboMinistry'); ?></td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr colspan="3">
												<td><button class="btn btn-primary" onClick="btnAttendanceRecap();" name="submit1">Submit</button></td>
											</tr>
										</table>
									</div>


									<div id="lateness" class="tab-pane fade" role="tabpanel">
										<table width="100%">
											<tr>
												<td>Date</td>
												<td width="2%">:</td>
												<td>
													<div class="input-group col-sm-12 col-xs-12">
														<input class="txDate tanggal" type="text" name="txDate" style="padding:10px;" />
													</div>
												</td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Start time</td>
												<td width="2%">:</td>
												<td>
													<div class="input-group col-sm-12 col-xs-12">
														<input class="txSTime waktu" type="text" name="txSTime" style="padding:10px;" />
													</div>
												</td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>End time</td>
												<td width="2%">:</td>
												<td>
													<div class="input-group col-sm-12 col-xs-12">
														<input class="txETime waktu" type="text" name="txETime" style="padding:10px;" />
													</div>
												</td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Department</td>
												<td width="2%">:</td>
												<td width="80%"><?= cboDepartment('cboDepartment'); ?></td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Ministry</td>
												<td width="2%">:</td>
												<td width="80%"><?= cboMinistry('cboMinistry'); ?></td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr colspan="3">
												<td><button class="btn btn-primary" onClick="btnAttendanceLateness();" name="submit2">Submit</button></td>
											</tr>
										</table>
									</div>


									<div id="att_summary" class="tab-pane fade" role="tabpanel">

										<table width="100%">
											<tr>
												<td>Month</td>
												<td width="2%">:</td>
												<td><select class="combomonth2 select2" name="combomonth2" style="cursor: pointer;padding: 5px;width: 90%">
														<?php
														$arr_month = array('January', 'Februari', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
														for ($i = 0; $i < 12; $i++) {
															echo "<option value='" . ($i + 1) . "' >" . $arr_month[$i] . "</option>";
														}
														?>
													</select>
												</td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Year</td>
												<td width="2%">:</td>
												<td>
													<select class="comboyear2 select2" name="comboyear2" style="cursor: pointer;padding: 5px;width: 90%">
														<?php
														$ystart = date('Y') - 5;
														$yend   = $ystart + 15;
														for ($i = $ystart; $i <= $yend; $i++) {
															echo "<option value='" . $i . "' " . ($i == date('Y') ? 'selected=selected' : '') . ">" . $i . "</option>";
														}
														?>
													</select>
												</td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Department</td>
												<td width="2%">:</td>
												<td width="80%"><?= cboDepartment('cboDepartment'); ?></td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Ministry</td>
												<td width="2%">:</td>
												<td width="80%"><?= cboMinistry('cboMinistry'); ?></td>
											</tr>
											<tr colspan="3">
												<td>&nbsp;</td>
											</tr>
											<tr colspan="3">
												<td><button class="btn btn-primary" onClick="btnAttendanceSummary();" name="submit3">Submit</button></td>
											</tr>
										</table>
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
				<p><?= footerSetup(); ?></p>
			</div>
		</div>
	</footer>
	<!-- /Footer -->

</div>
<!-- /Main Content -->


<script type="text/javascript">
	function btnAttendanceRecap() {
		var SMnth = $('.combomonth').val();
		var SYear = $('.comboyear').val();
		var SDept = $('#cboDepartment').val();
		var SMnst = $('#cboMinistry').val();
		//alert('<?= base_url(); ?>att_report/print/'+SMnth);

		var myWindow = window.open('<?= base_url(); ?>att_report/print/' + SMnth + '/' + SYear + '/' + SDept + '/' + SMnst, 'myWindow', 'width=900,height=600');
		//myWindow.print();
		setTimeout(function() {
			myWindow.print();
		}, 3000);
	}

	function btnAttendanceLateness() {
		var SDate = $('.txDate').val();
		var SSTime = $('.txSTime').val();
		var SETime = $('.txETime').val();
		var SDept = $('#cboDepartment').val();
		var SMnst = $('#cboMinistry').val();
		//alert(SDept); alert(SMnst);
		//alert('<?= base_url(); ?>att_report/print/'+SMnth);

		var myWindow = window.open('<?= base_url(); ?>att_report/print_lateness/' + SDate + '/' + SSTime + '/' + SETime + '/' + SDept + '/' + SMnst, 'myWindow', 'width=900,height=600');
		//myWindow.print();
		setTimeout(function() {
			myWindow.print();
		}, 3000);
	}

	function btnAttendanceSummary() {
		var SMnth = $('.combomonth2').val();
		var SYear = $('.comboyear2').val();
		var SDept = $('#cboDepartment').val();
		var SMnst = $('#cboMinistry').val();
		//alert('<?= base_url(); ?>att_report/print/'+SMnth);

		var myWindow = window.open('<?= base_url(); ?>att_report/print_summary/' + SMnth + '/' + SYear + '/' + SDept + '/' + SMnst, 'myWindow', 'width=900,height=600');
		//myWindow.print();
		setTimeout(function() {
			myWindow.print();
		}, 3000);
	}

	function btnLeaveReportByEmpNo() {
		var EmpNo = $('#cboEmpNo').val();
		var SDate = $('.txSLeaveDetailDate').val();
		var EDate = $('.txELeaveDetailDate').val();

		var myWindow = window.open('<?= base_url(); ?>emp_report/printbyempno/' + SDate + '/' + EDate + '/' + EmpNo, 'myWindow', 'width=900,height=600');
		setTimeout(function() {
			myWindow.print();
		}, 2000);
	}
</script>