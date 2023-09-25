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
        <h2 style="margin-top:0px">Emp_salary Read</h2>
        <table class="table">
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Basic Salary</td><td><?php echo $basic_salary; ?></td></tr>
	    <tr><td>Deduc Salary</td><td><?php echo $deduc_salary; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('payrollprocess') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>