
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Employee Leave Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?=base_url();?>">Dashboard</a></li>
						<li><a href="<?=base_url().index_page();?>/awardsetup"><span>Employee Leave Report</span></a></li>
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
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div  class="tab-struct custom-tab-1 mt-10">
										<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#leave">Leave</a></li>
											<li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#leave_detail">Leave Detail</a></li>
										</ul>
										<div class="tab-content" id="myTabContent_7">
											<div  id="leave" class="tab-pane fade active in" role="tabpanel">
                								<table width="100%">
                							 		<tr>
                										<td>Start Date</td>
                										<td width="2%">:</td>
                										<td>
                										    <div class="input-group col-sm-12 col-xs-12">
                										        <input class="txSLeaveDate tanggal" type="text" name="txSLeaveDate" style="padding:10px;"/>
                										    </div>
                								        </td>
                									</tr>
                									<tr colspan="3"><td>&nbsp;</td></tr>
                							 		<tr>
                										<td>End Date</td>
                										<td width="2%">:</td>
                										<td>
                										    <div class="input-group col-sm-12 col-xs-12">
                										        <input class="txELeaveDate tanggal" type="text" name="txELeaveDate" style="padding:10px;"/>
                										    </div>
                								        </td>
                									</tr>
                									<tr colspan="3"><td>&nbsp;</td></tr>
                									<tr colspan="3"><td><button class="btn btn-primary" name="submit" onClick="btnLeaveReport();">Submit</button></td></tr>
                								</table>
											</div>
											<div  id="leave_detail" class="tab-pane fade" role="tabpanel">
                								<table width="100%">
                							 		<tr>
                										<td>Start Date</td>
                										<td width="2%">:</td>
                										<td>
                										    <div class="input-group col-sm-12 col-xs-12">
                										        <input class="txSLeaveDetailDate tanggal" type="text" name="txSLeaveDetailDate" style="padding:10px;"/>
                										    </div>
                								        </td>
                									</tr>
                									<tr colspan="3"><td>&nbsp;</td></tr>
                							 		<tr>
                										<td>End Date</td>
                										<td width="2%">:</td>
                										<td>
                										    <div class="input-group col-sm-12 col-xs-12">
                										        <input class="txELeaveDetailDate tanggal" type="text" name="txELeaveDetailDate" style="padding:10px;"/>
                										    </div>
                								        </td>
                									</tr>
                									<tr colspan="3"><td>&nbsp;</td></tr>
                									<tr>
                										<td>Employee Name</td>
                										<td width="2%">:</td>
                										<td width="80%"><?=cboEmpNo('cboEmpNo');?></td>
                									</tr>
                									<tr colspan="3"><td>&nbsp;</td></tr>
                									<tr colspan="3"><td><button class="btn btn-primary" onClick="btnLeaveReportByEmpNo();" name="submit">Submit</button></td></tr>
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
						<p><?=footerSetup();?></p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
		<!-- /Main Content -->
		
		<script type="text/javascript">
		    function btnLeaveReport()
		    {
		        var SDate = $('.txSLeaveDate').val();
		        var EDate = $('.txELeaveDate').val();
                var myWindow = window.open('<?=base_url();?>emp_report/print/'+SDate+'/'+EDate, 'myWindow', 'width=900,height=600');
                setTimeout(function(){
                    myWindow.print();
                },2000);
		    }
		    function btnLeaveReportByEmpNo()
		    {
		        var EmpNo = $('#cboEmpNo').val();
		        var SDate = $('.txSLeaveDetailDate').val();
		        var EDate = $('.txELeaveDetailDate').val();
				alert(EmpNo);
                var myWindow = window.open('<?=base_url();?>emp_report/printbyempno/'+SDate+'/'+EDate+'/'+EmpNo, 'myWindow', 'width=900,height=600');
                setTimeout(function(){
                    myWindow.print();
                },2000);
		    }
		</script>
