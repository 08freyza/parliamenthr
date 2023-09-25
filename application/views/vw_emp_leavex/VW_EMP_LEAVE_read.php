<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">VW_EMP_LEAVE Read</h2>
        <table class="table">
	    <tr><td>Id</td><td><?php echo $id; ?></td></tr>
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Leave Desc</td><td><?php echo $leave_desc; ?></td></tr>
	    <tr><td>Sdate</td><td><?php echo $sdate; ?></td></tr>
	    <tr><td>Edate</td><td><?php echo $edate; ?></td></tr>
	    <tr><td>Total Day</td><td><?php echo $total_day; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Approve Date</td><td><?php echo $approve_date; ?></td></tr>
	    <tr><td>Leave Type</td><td><?php echo $leave_type; ?></td></tr>
	    <tr><td>Approve By</td><td><?php echo $approve_by; ?></td></tr>
	    <tr><td>Entry User</td><td><?php echo $entry_user; ?></td></tr>
	    <tr><td>Paidadvdate</td><td><?php echo $paidadvdate; ?></td></tr>
	    <tr><td>Curbalance</td><td><?php echo $curbalance; ?></td></tr>
	    <tr><td>Hours</td><td><?php echo $hours; ?></td></tr>
	    <tr><td>Is Paidadv</td><td><?php echo $is_paidadv; ?></td></tr>
	    <tr><td>Next Approval</td><td><?php echo $next_approval; ?></td></tr>
	    <tr><td>Spv Approved By</td><td><?php echo $spv_approved_by; ?></td></tr>
	    <tr><td>Spv Approved Date</td><td><?php echo $spv_approved_date; ?></td></tr>
	    <tr><td>Director Approved By</td><td><?php echo $director_approved_by; ?></td></tr>
	    <tr><td>Director Approved Date</td><td><?php echo $director_approved_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('vw_emp_leavex') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>