		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<hr class="light-grey-hr mb-10" />
				</li>
				<li>
					<a <?= ($this->router->fetch_class() == 'dashboard' ? 'class="active"' : ''); ?> href="<?= base_url(); ?>dashboard">
						<div class="pull-left"><i class="glyphicon glyphicon-stats mr-20"></i><span class="right-nav-text">Dashboard</span></div>
						<div class="clearfix"></div>
					</a>
				</li>
				<li>
					<a <?= (($this->router->fetch_class() == 'emp_personal') || ($this->router->fetch_class() == 'emp_info') || ($this->router->fetch_class() == 'res_booking') || ($this->router->fetch_class() == 'emp_detail') || ($this->router->fetch_class() == 'disciplinary') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr">
						<div class="pull-left"><i class="glyphicon glyphicon-briefcase mr-20"></i><span class="right-nav-text">Employee</span></div>
						<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
						<div class="clearfix"></div>
					</a>
					<ul id="dashboard_dr" class="collapse collapse-level-1 <?= (($this->router->fetch_class() == 'emp_personal') || ($this->router->fetch_class() == 'emp_info') || ($this->router->fetch_class() == 'res_booking') || ($this->router->fetch_class() == 'emp_detail') || ($this->router->fetch_class() == 'disciplinary') ? 'in' : ''); ?>">
						<li>
							<a href="<?= base_url(); ?>emp_personal" <?= ($this->router->fetch_class() == 'emp_personal') ? 'class="active"' : '' ?>>Employee Personal</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>emp_info" <?= ($this->router->fetch_class() == 'emp_info') ? 'class="active"' : '' ?>>Employee Information</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>res_booking" <?= ($this->router->fetch_class() == 'res_booking') ? 'class="active"' : '' ?>>Resource Booking</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>emp_detail" <?= ($this->router->fetch_class() == 'emp_detail') ? 'class="active"' : '' ?>>Employee Detail</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>disciplinary" <?= ($this->router->fetch_class() == 'disciplinary') ? 'class="active"' : '' ?>>Disciplinary</a>
						</li>
					</ul>
				</li>
				<li>
					<a <?= (($this->router->fetch_class() == 'users') || ($this->router->fetch_class() == 'roles') || ($this->router->fetch_class() == 'permissions') || ($this->router->fetch_class() == 'permission_page_matches') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#setup_user">
						<div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">Setup User</span></div>
						<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
						<div class="clearfix"></div>
					</a>
					<ul id="setup_user" class="collapse collapse-level-1 <?= (($this->router->fetch_class() == 'users') || ($this->router->fetch_class() == 'roles') || ($this->router->fetch_class() == 'permissions') || ($this->router->fetch_class() == 'permission_page_matches') ? 'in' : ''); ?>">
						<li>
							<a href="<?= base_url(); ?>users" <?= ($this->router->fetch_class() == 'users') ? 'class="active"' : '' ?>>Manage User</a>
							<?php
							if (isAdmin() == TRUE) { ?>
								<a href="<?= base_url(); ?>permissions" <?= ($this->router->fetch_class() == 'permissions') ? 'class="active"' : '' ?>>Manage Permissions</a>
								<a href="<?= base_url(); ?>permission_page_matches" <?= ($this->router->fetch_class() == 'permission_page_matches') ? 'class="active"' : '' ?>>Manage Permission Page</a>
								<a href="<?= base_url(); ?>roles" <?= ($this->router->fetch_class() == 'roles') ? 'class="active"' : '' ?>>Manage Role</a>
							<?php } ?>
						</li>
					</ul>
				</li>
				<?php
				if (isAdmin() == TRUE) { ?>
					<li>
						<a <?= (($this->router->fetch_class() == 'emp_status') || ($this->router->fetch_class() == 'demo_report') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#emp_report">
							<div class="pull-left"><i class="glyphicon glyphicon-stats mr-20"></i><span class="right-nav-text">Employee Report</span></div>
							<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
							<div class="clearfix"></div>
						</a>
						<ul id="emp_report" class="collapse collapse-level-1 <?= (($this->router->fetch_class() == 'emp_status') || ($this->router->fetch_class() == 'demo_report') ? 'in' : ''); ?>">
							<li>
								<a href="<?= base_url(); ?>emp_status" <?= ($this->router->fetch_class() == 'emp_status') ? 'class="active"' : '' ?>>Employee Status</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>demo_report" <?= ($this->router->fetch_class() == 'demo_report') ? 'class="active"' : '' ?>>Demographic Report</a>
							</li>
						</ul>
					</li>
				<?php } ?>
				<li>
					<a <?= (($this->router->fetch_class() == 'leave_balance') || ($this->router->fetch_class() == 'leave') || ($this->router->fetch_class() == 'emp_leave') || ($this->router->fetch_class() == 'emp_report') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#emp_leave">
						<div class="pull-left"><i class="fa fa-building mr-20"></i><span class="right-nav-text">Employee Leave</span></div>
						<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
						<div class="clearfix"></div>
					</a>
					<ul id="emp_leave" class="collapse collapse-level-1 <?= (($this->router->fetch_class() == 'leave_balance') || ($this->router->fetch_class() == 'leave') || ($this->router->fetch_class() == 'emp_leave') || ($this->router->fetch_class() == 'emp_report') ? 'in' : ''); ?>">
						<li>
							<a href="<?= base_url(); ?>leave" <?= ($this->router->fetch_class() == 'leave') ? 'class="active"' : '' ?>>Leave</a>
						</li>
						<?php
						if (isAdmin() == TRUE) { ?>
							<li>
								<a href="<?= base_url(); ?>leave_balance" <?= ($this->router->fetch_class() == 'leave_balance') ? 'class="active"' : '' ?>>Leave Balance</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>emp_leave" <?= ($this->router->fetch_class() == 'emp_leave') ? 'class="active"' : '' ?>>Employee Leave Approval</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>emp_report" <?= ($this->router->fetch_class() == 'emp_report') ? 'class="active"' : '' ?>>Employee Leave Report</a>
							</li>
						<?php } ?>
					</ul>
				</li>
				<li>
					<a <?= (($this->router->fetch_class() == 'upload_data') || ($this->router->fetch_class() == 'att_report') || ($this->router->fetch_class() == 'on_duty') || ($this->router->fetch_class() == 'myform') || ($this->router->fetch_class() == 'emp_att') || ($this->router->fetch_class() == 'overtime') || ($this->router->fetch_class() == 'att_history') || ($this->router->fetch_class() == 'permit') || ($this->router->fetch_class() == 'fingerscan') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#time_att">
						<div class="pull-left"><i class="glyphicon glyphicon-list-alt mr-20"></i><span class="right-nav-text">Time Attendance</span></div>
						<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
						<div class="clearfix"></div>
					</a>
					<ul id="time_att" class="collapse collapse-level-1 <?= (($this->router->fetch_class() == 'upload_data') || ($this->router->fetch_class() == 'att_report') || ($this->router->fetch_class() == 'on_duty') || ($this->router->fetch_class() == 'myform') || ($this->router->fetch_class() == 'emp_att') || ($this->router->fetch_class() == 'overtime') || ($this->router->fetch_class() == 'att_history') || ($this->router->fetch_class() == 'permit') || ($this->router->fetch_class() == 'fingerscan') ? 'in' : ''); ?>">
						<!--
						<li>
							<a  href="<?= base_url(); ?>upload_data">Upload Data</a>
						</li>
-->
						<?php
						if (isAdmin() == TRUE) { ?>
							<li>
								<a href="<?= base_url(); ?>att_report" <?= ($this->router->fetch_class() == 'att_report') ? 'class="active"' : '' ?>>Attendance Report</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>fingerscan" <?= ($this->router->fetch_class() == 'fingerscan') ? 'class="active"' : '' ?>>Fingerscan</a>
							</li>
						<?php } ?>
						<li>
							<a href="<?= base_url(); ?>on_duty" <?= ($this->router->fetch_class() == 'on_duty') ? 'class="active"' : '' ?>>On Duty</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>myform" <?= ($this->router->fetch_class() == 'myform') ? 'class="active"' : '' ?>>My Form</a>
						</li>
						<?php
						if (isAdmin() == TRUE) { ?>
							<li>
								<a href="<?= base_url(); ?>emp_att" <?= ($this->router->fetch_class() == 'emp_att') ? 'class="active"' : '' ?>>Employee Attendance</a>
							</li>
						<?php } ?>
						<!--
						<li>
							<a  href="<?= base_url(); ?>overtime">Overtime</a>
						</li>
-->
						<li>
							<a href="<?= base_url(); ?>att_history" <?= ($this->router->fetch_class() == 'att_history') ? 'class="active"' : '' ?>>Attendance History</a>
						</li>
						<li hidden>
							<a href="<?= base_url(); ?>permit" <?= ($this->router->fetch_class() == 'permit') ? 'class="active"' : '' ?>>Permit</a>
						</li>
					</ul>
				</li>
				<li>
					<a <?= ($this->router->fetch_class() == 'usermanual' ? 'class="active"' : ''); ?> href="<?= base_url(); ?>usermanual">
						<div class="pull-left"><i class="glyphicon glyphicon-book mr-20"></i><span class="right-nav-text">User Manual</span></div>
						<div class="clearfix"></div>
					</a>
				</li>
				<!--
                <li>
					<a <?= (($this->router->fetch_class() == 'myreimburst') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#reimburstment"><div class="pull-left"><i class="glyphicon glyphicon-duplicate mr-20"></i><span class="right-nav-text">Reimburstment</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="reimburstment" class="collapse collapse-level-1">
						<li>
							<a  href="<?= base_url(); ?>myreimburst">My Reimburstment</a>
						</li>
					</ul>
				</li>
				<li>
					<a <?= (($this->router->fetch_class() == 'awardhistory') || ($this->router->fetch_class() == 'disciplehistory') || ($this->router->fetch_class() == 'myaward') || ($this->router->fetch_class() == 'mydisciple') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#careeradmin"><div class="pull-left"><i class="fa fa-sitemap mr-20"></i><span class="right-nav-text">Career Admin</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="careeradmin" class="collapse collapse-level-1">
						<li>
							<a  href="<?= base_url(); ?>awardhistory">Award History</a>
						</li>
						<li>
							<a  href="<?= base_url(); ?>disciplehistory">Disciplines History</a>
						</li>
						<li>
							<a  href="<?= base_url(); ?>myaward">My Award</a>
						</li>
						<li>
							<a  href="<?= base_url(); ?>mydisciple">My Disciplines</a>
						</li>
					</ul>
				</li>
				<li>
					<a <?= (($this->router->fetch_class() == 'payrollsetup') || ($this->router->fetch_class() == 'payrollprocess') || ($this->router->fetch_class() == 'bankreport') || ($this->router->fetch_class() == 'vnpfreport') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#payroll"><div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Payroll</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="payroll" class="collapse collapse-level-1">
						<li>
							<a  href="<?= base_url(); ?>payrollsetup">Payroll Setup</a>
						</li>
						<li>
							<a  href="<?= base_url(); ?>payrollprocess">Payroll Process</a>
						</li>
						<li>
							<a  href="<?= base_url(); ?>bankreport">Bank Report</a>
						</li>
						<li>
							<a  href="<?= base_url(); ?>vnpfreport">VNPF Report</a>
						</li>
					</ul>
				</li>
				<li>
					<a <?= (($this->router->fetch_class() == 'myloan') || ($this->router->fetch_class() == 'emploan') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#loan"><div class="pull-left"><i class="glyphicon glyphicon-download-alt mr-20"></i><span class="right-nav-text">Loan</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="loan" class="collapse collapse-level-1">
						<li>
							<a  href="<?= base_url(); ?>myloan">My Loan</a>
						</li>
						<li>
							<a  href="<?= base_url(); ?>emploan">Employee Loan</a>
						</li>
					</ul>
				</li>
-->
				<?php
				if (isAdmin() == TRUE) { ?>
					<li>
						<a <?= (($this->router->fetch_class() == 'ministrysetup') || ($this->router->fetch_class() == 'divsetup') || ($this->router->fetch_class() == 'deptsetup') || ($this->router->fetch_class() == 'titlesetup') || ($this->router->fetch_class() == 'familysetup') || ($this->router->fetch_class() == 'hospitalsetup') || ($this->router->fetch_class() == 'resource_type') || ($this->router->fetch_class() == 'Keensetup') || ($this->router->fetch_class() == 'reimsetup') || ($this->router->fetch_class() == 'locatsetup') || ($this->router->fetch_class() == 'religionsetup') || ($this->router->fetch_class() == 'maritalsetup') || ($this->router->fetch_class() == 'compunit') || ($this->router->fetch_class() == 'skillsetup') || ($this->router->fetch_class() == 'educationsetup') || ($this->router->fetch_class() == 'countrysetup') || ($this->router->fetch_class() == 'leavesetup') || ($this->router->fetch_class() == 'banksetup') || ($this->router->fetch_class() == 'eduinstsetup') || ($this->router->fetch_class() == 'taskcatsetup') || ($this->router->fetch_class() == 'awardsetup') || ($this->router->fetch_class() == 'disciplinarysetup') || ($this->router->fetch_class() == 'institutionsetup') || ($this->router->fetch_class() == 'publicholidaysetup') ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#settings">
							<div class="pull-left"><i class="fa fa-gears mr-20"></i><span class="right-nav-text">Settings</span></div>
							<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
							<div class="clearfix"></div>
						</a>
						<ul id="settings" class="collapse collapse-level-1 <?= (($this->router->fetch_class() == 'ministrysetup') || ($this->router->fetch_class() == 'divsetup') || ($this->router->fetch_class() == 'deptsetup') || ($this->router->fetch_class() == 'titlesetup') || ($this->router->fetch_class() == 'familysetup') || ($this->router->fetch_class() == 'hospitalsetup') || ($this->router->fetch_class() == 'resource_type') || ($this->router->fetch_class() == 'Keensetup') || ($this->router->fetch_class() == 'reimsetup') || ($this->router->fetch_class() == 'locatsetup') || ($this->router->fetch_class() == 'religionsetup') || ($this->router->fetch_class() == 'maritalsetup') || ($this->router->fetch_class() == 'compunit') || ($this->router->fetch_class() == 'skillsetup') || ($this->router->fetch_class() == 'educationsetup') || ($this->router->fetch_class() == 'countrysetup') || ($this->router->fetch_class() == 'leavesetup') || ($this->router->fetch_class() == 'banksetup') || ($this->router->fetch_class() == 'eduinstsetup') || ($this->router->fetch_class() == 'taskcatsetup') || ($this->router->fetch_class() == 'awardsetup') || ($this->router->fetch_class() == 'disciplinarysetup') || ($this->router->fetch_class() == 'institutionsetup') || ($this->router->fetch_class() == 'publicholidaysetup') ? 'in' : ''); ?>">
							<!-- <li>
							<a  href="<?= base_url(); ?>profile">Profile</a>
						</li> -->
							<li>
								<a href="<?= base_url(); ?>ministrysetup" <?= ($this->router->fetch_class() == 'ministrysetup') ? 'class="active bg-secondary"' : '' ?>>Parliament Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>divsetup" <?= ($this->router->fetch_class() == 'divsetup') ? 'class="active"' : '' ?>>Division Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>deptsetup" <?= ($this->router->fetch_class() == 'deptsetup') ? 'class="active"' : '' ?>>Department Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>titlesetup" <?= ($this->router->fetch_class() == 'titlesetup') ? 'class="active"' : '' ?>>Title Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>familysetup" <?= ($this->router->fetch_class() == 'familysetup') ? 'class="active"' : '' ?>>Family Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>hospitalsetup" <?= ($this->router->fetch_class() == 'hospitalsetup') ? 'class="active"' : '' ?>>Hospital Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>resource_type" <?= ($this->router->fetch_class() == 'resource_type') ? 'class="active"' : '' ?>>Resource Type</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>Keensetup" <?= ($this->router->fetch_class() == 'Keensetup') ? 'class="active"' : '' ?>>Keen Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>reimsetup" <?= ($this->router->fetch_class() == 'reimsetup') ? 'class="active"' : '' ?>>Reimburstment Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>locatsetup" <?= ($this->router->fetch_class() == 'locatsetup') ? 'class="active"' : '' ?>>Location Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>religionsetup" <?= ($this->router->fetch_class() == 'religionsetup') ? 'class="active"' : '' ?>>Religion Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>maritalsetup" <?= ($this->router->fetch_class() == 'maritalsetup') ? 'class="active"' : '' ?>>Marital Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>compunit" <?= ($this->router->fetch_class() == 'compunit') ? 'class="active"' : '' ?>>Company Unit Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>skillsetup" <?= ($this->router->fetch_class() == 'skillsetup') ? 'class="active"' : '' ?>>Skill Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>educationsetup" <?= ($this->router->fetch_class() == 'educationsetup') ? 'class="active"' : '' ?>>Education Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>countrysetup" <?= ($this->router->fetch_class() == 'countrysetup') ? 'class="active"' : '' ?>>Country Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>leavesetup" <?= ($this->router->fetch_class() == 'leavesetup') ? 'class="active"' : '' ?>>Leave Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>banksetup" <?= ($this->router->fetch_class() == 'banksetup') ? 'class="active"' : '' ?>>Bank Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>eduinstsetup" <?= ($this->router->fetch_class() == 'eduinstsetup') ? 'class="active"' : '' ?>>Education Institution Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>taskcatsetup" <?= ($this->router->fetch_class() == 'taskcatsetup') ? 'class="active"' : '' ?>>Task Category Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>awardsetup" <?= ($this->router->fetch_class() == 'awardsetup') ? 'class="active"' : '' ?>>Award Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>disciplinarysetup" <?= ($this->router->fetch_class() == 'disciplinarysetup') ? 'class="active"' : '' ?>>Disclipinary Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>institutionsetup" <?= ($this->router->fetch_class() == 'institutionsetup') ? 'class="active"' : '' ?>>Institution Setup</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>publicholidaysetup" <?= ($this->router->fetch_class() == 'publicholidaysetup') ? 'class="active"' : '' ?>>Public Holiday Setup</a>
							</li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->