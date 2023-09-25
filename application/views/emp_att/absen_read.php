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
        <h2 style="margin-top:0px">Absen Read</h2>
        <table class="table">
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Start Time</td><td><?php echo $start_time; ?></td></tr>
	    <tr><td>End Time</td><td><?php echo $end_time; ?></td></tr>
	    <tr><td>Ot</td><td><?php echo $ot; ?></td></tr>
	    <tr><td>Lunch Out</td><td><?php echo $lunch_out; ?></td></tr>
	    <tr><td>Lunch In</td><td><?php echo $lunch_in; ?></td></tr>
	    <tr><td>Type</td><td><?php echo $type; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('emp_att') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>