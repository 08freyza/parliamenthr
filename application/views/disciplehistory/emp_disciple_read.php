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
        <h2 style="margin-top:0px">Emp_disciple Read</h2>
        <table class="table">
	    <tr><td>Disciple No</td><td><?php echo $disciple_no; ?></td></tr>
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Disciple Category</td><td><?php echo $disciple_category; ?></td></tr>
	    <tr><td>Disciple Date</td><td><?php echo $disciple_date; ?></td></tr>
	    <tr><td>Sdate</td><td><?php echo $sdate; ?></td></tr>
	    <tr><td>Edate</td><td><?php echo $edate; ?></td></tr>
	    <tr><td>Remark</td><td><?php echo $remark; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('disciplehistory') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>