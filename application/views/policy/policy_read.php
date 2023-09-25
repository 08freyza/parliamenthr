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
        <h2 style="margin-top:0px">Policy Read</h2>
        <table class="table">
	    <tr><td>Id Cat</td><td><?php echo $id_cat; ?></td></tr>
	    <tr><td>Id Subcat</td><td><?php echo $id_subcat; ?></td></tr>
	    <tr><td>Policy Name</td><td><?php echo $policy_name; ?></td></tr>
	    <tr><td>Sum Assured</td><td><?php echo $sum_assured; ?></td></tr>
	    <tr><td>Premium</td><td><?php echo $premium; ?></td></tr>
	    <tr><td>Tenure</td><td><?php echo $tenure; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('policy') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>