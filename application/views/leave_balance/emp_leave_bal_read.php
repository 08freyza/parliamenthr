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
        <h2 style="margin-top:0px">Emp_leave_bal Read</h2>
        <table class="table">
	    <tr><td>Leave Type</td><td><?php echo $leave_type; ?></td></tr>
	    <tr><td>Balance</td><td><?php echo $balance; ?></td></tr>
	    <tr><td>Latestupdate</td><td><?php echo $latestupdate; ?></td></tr>
	    <tr><td>Latestid</td><td><?php echo $latestid; ?></td></tr>
	    <tr><td>Updatedate</td><td><?php echo $updatedate; ?></td></tr>
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Updateid</td><td><?php echo $updateid; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('leave_balance') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>