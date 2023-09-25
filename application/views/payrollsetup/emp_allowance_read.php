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
        <h2 style="margin-top:0px">Emp_allowance Read</h2>
        <table class="table">
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Allow Name</td><td><?php echo $allow_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('payrollsetup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>