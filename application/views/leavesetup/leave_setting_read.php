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
        <h2 style="margin-top:0px">Leave_setting Read</h2>
        <table class="table">
	    <tr><td>Leave Name</td><td><?php echo $leave_name; ?></td></tr>
	    <tr><td>Eligibility</td><td><?php echo $eligibility; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('leavesetup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>