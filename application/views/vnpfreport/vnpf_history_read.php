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
        <h2 style="margin-top:0px">Vnpf_history Read</h2>
        <table class="table">
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
	    <tr><td>Vnpf</td><td><?php echo $vnpf; ?></td></tr>
	    <tr><td>Month</td><td><?php echo $month; ?></td></tr>
	    <tr><td>Year</td><td><?php echo $year; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('vnpfreport') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>