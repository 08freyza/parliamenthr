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
        <h2 style="margin-top:0px">Emp_reim Read</h2>
        <table class="table">
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Reim Type</td><td><?php echo $reim_type; ?></td></tr>
	    <tr><td>Reim Val</td><td><?php echo $reim_val; ?></td></tr>
	    <tr><td>Reim Date</td><td><?php echo $reim_date; ?></td></tr>
	    <tr><td>Reim Paid</td><td><?php echo $reim_paid; ?></td></tr>
	    <tr><td>Reim Unpaid</td><td><?php echo $reim_unpaid; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('myreimburst') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>