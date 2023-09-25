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
        <h2 style="margin-top:0px">Emp_status Read</h2>
        <table class="table">
	    <tr><td>Emp Desc</td><td><?php echo $emp_desc; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('employee_status') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>